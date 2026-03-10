<?php
$page_id="admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* GET PRODUCTS */

$res = mysqli_query($conn,"
SELECT 
p.product_code,
p.product_name,
p.category_num,
p.price,
p.stock_qty,
p.is_featured,
p.is_active,
MIN(i.image_path) AS image_path
FROM products p
LEFT JOIN product_images i
ON p.product_code = i.product_code
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

<!-- PRODUCT IMAGE -->

<img
src="/aiza-collections-final/assets/<?= $p['image_path'] ?>"
alt="<?= htmlspecialchars($p['product_name']) ?>"
>


<!-- PRODUCT NAME -->

<h4><?= htmlspecialchars($p['product_name']) ?></h4>


<!-- CATEGORY -->

<p class="admin-meta">
Category: <?= $p['category_num'] ?>
</p>


<!-- PRICE -->

<p class="price">
₹<?= number_format($p['price']) ?>
</p>


<!-- STOCK STATUS -->

<?php if($p['stock_qty'] == 0): ?>

<p class="stock stock-out">
Out of Stock
</p>

<?php elseif($p['stock_qty'] <= 5): ?>

<p class="stock stock-low">
Low Stock (<?= $p['stock_qty'] ?>)
</p>

<?php else: ?>

<p class="stock">
Stock: <?= $p['stock_qty'] ?>
</p>

<?php endif; ?>


<!-- FEATURED BADGE -->

<?php if($p['is_featured']): ?>

<p class="badge featured-badge">
Featured
</p>

<?php endif; ?>


<!-- ACTIVE STATUS -->

<?php if(!$p['is_active']): ?>

<p class="badge inactive-badge">
Inactive
</p>

<?php endif; ?>


<!-- ACTION BUTTONS -->

<div class="admin-actions">

<a
class="btn small-btn"
href="edit_product.php?code=<?= $p['product_code'] ?>"
>
Edit
</a>


<form method="post" action="delete_product.php"
onsubmit="return confirm('Are you sure you want to delete this product?');">

<input type="hidden" name="code" value="<?= $p['product_code'] ?>">
<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<button class="btn small-btn danger-btn">
Delete
</button>

</form>


<form method="post" action="toggle_featured.php"
onsubmit="return confirm('Are you sure you want to change the featured status of this product?');">

<input type="hidden" name="code" value="<?= $p['product_code'] ?>">
<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<button class="btn small-btn">

<?= $p['is_featured'] ? "Unfeature" : "Feature" ?>

</button>

</form>

</div>

</div>

<?php endwhile; ?>

</div>

</section>

<?php include "../../includes/footer.php"; ?>