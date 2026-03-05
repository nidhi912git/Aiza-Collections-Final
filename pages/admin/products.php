<?php
$page_id="admin-products";
include "../../includes/config.php";
include "../../includes/security.php";
require_admin();
include "../../includes/header.php";

$res = mysqli_query($conn,"SELECT product_code,product_name,price,is_featured FROM products");
?>

<section>

<h2 class="section-title">Admin Product Control</h2>

<div class="grid grid-3">

<?php while($p=mysqli_fetch_assoc($res)): ?>

<div class="product-card">

<h4><?= htmlspecialchars($p['product_name']) ?></h4>

<p>₹<?= $p['price'] ?></p>

<form method="post" action="toggle_featured.php">

<input type="hidden" name="code" value="<?= $p['product_code'] ?>">
<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<button class="btn">
<?= $p['is_featured'] ? "Remove Featured" : "Make Featured" ?>
</button>

</form>

</div>

<?php endwhile; ?>

</div>

</section>

<?php include "../../includes/footer.php"; ?>