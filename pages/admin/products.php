<?php
$page_id="admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* GET PRODUCTS */

$res=mysqli_query($conn,"
SELECT 
p.product_code,
p.product_name,
p.category_num,
p.price,
p.is_featured,
p.is_active,
MIN(i.image_path) image_path,
SUM(ps.stock_qty) stock_qty
FROM products p
LEFT JOIN product_images i
ON p.product_code=i.product_code
LEFT JOIN product_stock ps
ON p.product_code=ps.product_code
GROUP BY p.product_code
ORDER BY p.product_name
");
?>

<section>

<div class="admin-header">

<h2 class="section-title">Product Management</h2>

<a href="add_product.php" class="btn">
Add New Product
</a>

</div>

<div class="admin-products">

<?php while($p=mysqli_fetch_assoc($res)): ?>

<div class="admin-card">

<img
src="<?= imgPath($p['image_path'] ?? 'no-image.jpg') ?>"
>

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

<div class="admin-actions">

<a
class="btn small-btn"
href="edit_product.php?code=<?= $p['product_code'] ?>">
Edit
</a>

<form method="post" action="delete_product.php">

<input type="hidden" name="code"
value="<?= $p['product_code'] ?>">

<input type="hidden" name="csrf"
value="<?= csrf_token() ?>">

<button class="btn small-btn danger-btn">
Delete
</button>

</form>

</div>

</div>

<?php endwhile; ?>

</div>

</section>

<?php include "../../includes/footer.php"; ?>