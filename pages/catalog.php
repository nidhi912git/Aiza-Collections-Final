<?php
$page_id = "catalog-page";

include "../includes/config.php";
include "../includes/header.php";

$search   = $_GET['q'] ?? '';
$category = $_GET['category'] ?? 'all';
$price    = $_GET['price'] ?? 'default';

/* WHERE CONDITIONS */

$where = [];
$where[] = "p.product_code NOT LIKE '%-%'";
$where[] = "p.is_active = 1";

if ($search !== '') {
    $safe = mysqli_real_escape_string($conn, $search);
    $where[] = "p.product_name LIKE '%$safe%'";
}

if ($category !== 'all') {
    $cat = intval($category);
    $where[] = "p.category_num = $cat";
}

/* ORDER BY */

$order = "";

if ($price === "low-high") {
    $order = "ORDER BY p.price ASC";
} elseif ($price === "high-low") {
    $order = "ORDER BY p.price DESC";
}

/* FINAL QUERY */

$sql = "
SELECT
p.product_code,
p.product_name,
p.price,

(
SELECT COALESCE(SUM(stock_qty),0)
FROM product_stock
WHERE product_code = p.product_code
) AS stock_qty,

(
SELECT image_path
FROM product_images
WHERE product_code = p.product_code
ORDER BY image_id ASC
LIMIT 1
) AS image_path

FROM products p
WHERE " . implode(" AND ", $where) . "
$order
";

$result = mysqli_query($conn, $sql);
?>

<section>

    <h2 class="section-title">Our Collection</h2>

    <form class="catalog-filters" method="get">

        <select name="category" onchange="this.form.submit()">

            <option value="all">All Categories</option>

            <option value="1" <?= $category == 1 ? 'selected' : '' ?>>Anarkali Set</option>

            <option value="2" <?= $category == 2 ? 'selected' : '' ?>>Chikankari</option>

            <option value="3" <?= $category == 3 ? 'selected' : '' ?>>Co‑ord Set</option>

            <option value="4" <?= $category == 4 ? 'selected' : '' ?>>Dress Material</option>

            <option value="5" <?= $category == 5 ? 'selected' : '' ?>>Sharara Set</option>

            <option value="6" <?= $category == 6 ? 'selected' : '' ?>>Straight Kurta Set</option>

        </select>

        <input type="hidden" name="q" value="<?= htmlspecialchars($search) ?>">

        <select name="price" onchange="this.form.submit()">

            <option value="default">Sort by Price</option>

            <option value="low-high" <?= $price == 'low-high' ? 'selected' : '' ?>>Low to High</option>

            <option value="high-low" <?= $price == 'high-low' ? 'selected' : '' ?>>High to Low</option>

        </select>

    </form>

    <div class="grid grid-3" id="product-grid">

        <?php while ($row = mysqli_fetch_assoc($result)): ?>

            <div class="product-card"
                onclick="viewProduct('<?= $row['product_code'] ?>')">

                <img
                    src="<?= imgPath($row['image_path']) ?>"
                    alt="<?= htmlspecialchars($row['product_name']) ?>">

                <h4><?= htmlspecialchars($row['product_name']) ?></h4>

                <p class="price">
                    ₹<?= number_format($row['price']) ?>
                </p>

                <p class="stock">

                    <?= $row['stock_qty'] > 0 ? "In Stock" : "Out of Stock" ?>

                </p>

                <div class="actions horizontal-actions"
                    onclick="event.stopPropagation();">

                    <button
                        class="add-cart-btn"
                        data-code="<?= $row['product_code'] ?>"
                        onclick="addToCart(event,this)"
                        <?= $row['stock_qty'] <= 0 ? "disabled" : "" ?>>
                        Add to Cart
                    </button>

                    <button
                        class="wishlist-btn"
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