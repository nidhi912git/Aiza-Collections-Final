<?php
$page_id = "home-page";
include "../includes/config.php";
include "../includes/header.php";

$search = $_GET['q'] ?? '';
?>

<section class="hero">
  <div class="hero-content">
    <h1>Welcome to Aiza Collections</h1>
    <p>
      Handpicked Indian traditional wear crafted for every occasion.
      Tradition meets modern elegance.
    </p>
    <a href="/aiza-collections-final/pages/catalog.php" class="btn">Shop Now</a>
  </div>
</section>

<section>
<h2 class="section-title">Featured Products</h2>

<?php
$searchSafe = mysqli_real_escape_string($conn,$search);

$where = "p.is_featured = 1";

if($searchSafe != ''){
$where .= " AND p.product_name LIKE '%$searchSafe%'";
}

$sql = "
SELECT
p.product_code,
p.product_name,
p.price,
p.stock_qty,
MIN(i.image_path) AS image_path
FROM products p
LEFT JOIN product_images i
ON p.product_code = i.product_code
WHERE $where
GROUP BY p.product_code
LIMIT 15
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo '<p style="color:red;">DB Error: ' . mysqli_error($conn) . '</p>';
}
?>

<div class="grid grid-3" id="product-grid">

<?php while ($row = mysqli_fetch_assoc($result)): ?>

<div class="product-card"
     onclick="viewProduct('<?= $row['product_code'] ?>')">

<img src="/aiza-collections-final/assets/<?= htmlspecialchars($row['image_path']) ?>"
     alt="<?= htmlspecialchars($row['product_name']) ?>">

<h4><?= htmlspecialchars($row['product_name']) ?></h4>

<p class="price">₹<?= number_format($row['price']) ?></p>

<p class="stock">
<?= $row['stock_qty'] > 0 ? "In Stock" : "Out of Stock" ?>
</p>

<div class="actions horizontal-actions"
     onclick="event.stopPropagation();">

<button class="add-cart-btn"
        data-code="<?= $row['product_code'] ?>"
        onclick="addToCart(event,this)"
        <?= $row['stock_qty'] <= 0 ? "disabled" : "" ?>>
Add to Cart
</button>

<button class="wishlist-btn"
        data-code="<?= $row['product_code'] ?>"
        onclick="addToWishlist(event,this)"
        <?= $row['stock_qty'] <= 0 ? "disabled" : "" ?>>
♡
</button>

</div>

</div>

<?php endwhile; ?>

</div>
</section>

<div class="popup"></div>

<?php include "../includes/footer.php"; ?>