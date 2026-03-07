<?php
$page_id="admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

$res = mysqli_query($conn,"
SELECT p.product_code,p.product_name,p.price,p.is_featured,
MIN(i.image_path) image_path
FROM products p
LEFT JOIN product_images i
ON p.product_code=i.product_code
GROUP BY p.product_code
");
?>

<section>

<div class="admin-header">

<h2 class="section-title">Admin Product Control</h2>

<a href="add_product.php" class="btn">
Add Product
</a>

</div>
<div class="admin-products">

<?php while($p=mysqli_fetch_assoc($res)): ?>

<div class="admin-card">

<img src="/aiza-collections-final/assets/<?= $p['image_path'] ?>">

<h4><?= htmlspecialchars($p['product_name']) ?></h4>

<p>₹<?= $p['price'] ?></p>

<div class="admin-actions">

<a class="btn"
href="edit_product.php?code=<?= $p['product_code'] ?>">
Edit
</a>

<form method="post" action="delete_product.php">
<input type="hidden" name="code" value="<?= $p['product_code'] ?>">
<input type="hidden" name="csrf" value="<?= csrf_token() ?>">
<button class="btn">Delete</button>
</form>

<form method="post" action="toggle_featured.php">
<input type="hidden" name="code" value="<?= $p['product_code'] ?>">
<input type="hidden" name="csrf" value="<?= csrf_token() ?>">
<button class="btn">
<?= $p['is_featured'] ? "Unfeature" : "Feature" ?>
</button>
</form>

</div>

</div>

<?php endwhile; ?>

</div>
</section>

<?php include "../../includes/footer.php"; ?>