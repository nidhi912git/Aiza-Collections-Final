<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";
$search   = $_GET['q'] ?? '';
$category = $_GET['category'] ?? 'all';
$price    = $_GET['price'] ?? 'default';

/* WHERE CONDITIONS */

$where = [];
$where[] = "p.product_code NOT LIKE '%-%'";
$where[] = "p.is_active = 1";

if ($search !== '') {
    $safe = mysqli_real_escape_string($conn, strtolower($search));

    $where[] = "(
        LOWER(p.product_name) LIKE '%$safe%'
        OR (
            p.category_num = CASE
                WHEN '$safe' LIKE '%anarkali%' THEN 1
                WHEN '$safe' LIKE '%chikankari%' THEN 2
                WHEN '$safe' LIKE '%coord%' OR '$safe' LIKE '%co-ord%' THEN 3
                WHEN '$safe' LIKE '%dress%' THEN 4
                WHEN '$safe' LIKE '%sharara%' THEN 5
                WHEN '$safe' LIKE '%kurta%' THEN 6
                ELSE -1
            END
         )
    )";
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


/* GET PRODUCTS WITH MAIN IMAGE + STOCK */
$res = mysqli_query($conn, "
SELECT
p.product_code,
p.product_name,
p.category_num,
p.price,
p.is_featured,
p.is_active,

MIN(i.image_path) AS image_path,
COALESCE(SUM(ps.stock_qty),0) AS stock_qty

FROM products p

LEFT JOIN product_images i
ON i.product_code = p.product_code

LEFT JOIN product_stock ps
ON ps.product_code = p.product_code

WHERE p.product_code NOT LIKE '%-%'

GROUP BY
p.product_code,
p.product_name,
p.category_num,
p.price,
p.is_featured,
p.is_active

ORDER BY p.product_name
");

?>

<section>

    <div class="admin-header-products">

        <h2 class="section-title">
            Manager's Overview of Products
        </h2>

        <div class="admin-actions">
            <a href="dashboard.php" class="btn">Dashboard</a>
            <a href="add_product.php" class="btn add-product-btn">Add New Product</a>
        </div>

    </div>
    
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



    <?php if (isset($_SESSION['undo'])): ?>

        <div class="admin-undo">

            <p><?= $_SESSION['undo']['msg'] ?></p>

            <form method="post" action="<?= $_SESSION['undo']['action'] ?>">

                <?php foreach ($_SESSION['undo']['data'] as $k => $v): ?>

                    <input type="hidden" name="<?= $k ?>" value="<?= htmlspecialchars($v) ?>">

                <?php endforeach; ?>

                <button class="btn small-btn">Undo</button>

            </form>

        </div>

    <?php unset($_SESSION['undo']);
    endif; ?>

    <div class="admin-products">

        <?php if (mysqli_num_rows($res) == 0): ?>

            <p style="text-align:center;">No products found.</p>

        <?php else: ?>

            <?php while ($p = mysqli_fetch_assoc($res)): ?>

                <div class="admin-card">

                    <img
                        src="<?= imgPath($p['image_path']) ?>"
                        alt="<?= htmlspecialchars($p['product_name']) ?>">

                    <h4><?= htmlspecialchars($p['product_name']) ?></h4>

                    <p class="admin-meta">
                        Category: <?= $p['category_num'] ?>
                    </p>

                    <p class="price">
                        ₹<?= number_format($p['price']) ?>
                    </p>

                    <p class="stock">
                        Stock: <?= $p['stock_qty'] ?>
                    </p>

                    <?php if ($p['is_featured']): ?>
                        <p class="badge featured-badge">Featured</p>
                    <?php endif; ?>

                    <?php if (!$p['is_active']): ?>
                        <p class="badge inactive-badge">Inactive</p>
                    <?php endif; ?>

                    <div class="admin-actions">

                        <a
                            class="btn small-btn"
                            href="edit_product.php?code=<?= urlencode($p['product_code']) ?>">
                            Edit
                        </a>

                        <form method="post" action="toggle_featured.php" class="confirm-form" data-type="feature">

                            <input type="hidden" name="code"
                                value="<?= htmlspecialchars($p['product_code']) ?>">

                            <input type="hidden" name="csrf"
                                value="<?= csrf_token() ?>">

                            <button class="btn small-btn">
                                <?= $p['is_featured'] ? "Unfeature" : "Feature" ?>
                            </button>

                        </form>

                        <form method="post" action="delete_product.php" class="confirm-form" data-type="delete">

                            <input
                                type="hidden"
                                name="code"
                                value="<?= htmlspecialchars($p['product_code']) ?>">

                            <input
                                type="hidden"
                                name="csrf"
                                value="<?= csrf_token() ?>">

                            <button class="btn small-btn danger-btn">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

</section>

<?php include "../../includes/footer.php"; ?>