<?php
$page_id = "home-page";
include "../includes/config.php";
include "../includes/header.php";

$search = $_GET['q'] ?? '';
?>

<!-- HERO -->

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


<!-- CATEGORY SLIDER -->

<section class="category-slider">

<div class="slider-wrapper">

<button class="slider-btn prev" onclick="prevSlide()">❮</button>

<div class="slides">

<div class="slide">
<img src="/aiza-collections-final/assets/categories/anarkali_suit/A1.jpeg">

<div class="slide-content">
<h2>Anarkali Collection</h2>
<p>Elegant traditional Anarkali outfits for every occasion.</p>
<a href="/aiza-collections-final/pages/catalog.php?category=1" class="btn">Shop Collection</a>
</div>

</div>


<div class="slide">

<img src="/aiza-collections-final/assets/categories/chikankari/C1.jpeg">

<div class="slide-content">
<h2>Chikankari Collection</h2>
<p>Graceful styles blending comfort with tradition.</p>
<a href="/aiza-collections-final/pages/catalog.php?category=2" class="btn">Shop Collection</a>
</div>

</div>


<div class="slide">

<img src="/aiza-collections-final/assets/categories/coord_set/CO1.jpeg">

<div class="slide-content">
<h2>Co‑Ord Sets</h2>
<p>Modern coordinated sets for a stylish everyday look.</p>
<a href="/aiza-collections-final/pages/catalog.php?category=3" class="btn">Shop Collection</a>
</div>

</div>


<div class="slide">

<img src="/aiza-collections-final/assets/categories/straight_kurti/S1.jpeg">

<div class="slide-content">
<h2>Straight Kurti Collection</h2>
<p>Minimal elegance with timeless silhouettes.</p>
<a href="/aiza-collections-final/pages/catalog.php?category=5" class="btn">Shop Collection</a>
</div>

</div>

</div>

<button class="slider-btn next" onclick="nextSlide()">❯</button>

<div class="slider-dots">
<span class="dot active" onclick="showSlide(0)"></span>
<span class="dot" onclick="showSlide(1)"></span>
<span class="dot" onclick="showSlide(2)"></span>
<span class="dot" onclick="showSlide(3)"></span>
</div>

</div>

</section>


<!-- FEATURED PRODUCTS -->

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
AND p.product_code NOT LIKE '%-%'
GROUP BY p.product_code
LIMIT 15
";

$result = mysqli_query($conn,$sql);

if(!$result){
echo "<p>Database Error</p>";
}

?>

<div class="grid grid-3" id="product-grid">

<?php while($row = mysqli_fetch_assoc($result)): ?>

<div class="product-card"
onclick="viewProduct('<?= $row['product_code'] ?>')">

<img src="<?= imgPath($row['image_path'] ?? 'no-image.jpg') ?>">
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