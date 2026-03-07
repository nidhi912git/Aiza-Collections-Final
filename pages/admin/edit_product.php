<?php
$page_id = "admin-page";
include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

$code=$_GET['code'] ?? '';

$q=mysqli_query($conn,
"SELECT * FROM products
WHERE product_code='$code'");

$p=mysqli_fetch_assoc($q);

include "../../includes/header.php";
?>

<section>

<h2>Edit Product</h2>

<form method="post" action="update_product.php" class="admin-form">

<input type="hidden" name="code" value="<?= $p['product_code'] ?>">
<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<label>Name</label>
<input type="text" name="name"
value="<?= htmlspecialchars($p['product_name']) ?>">

<label>Price</label>
<input type="number" name="price"
value="<?= $p['price'] ?>">

<label>Stock</label>
<input type="number" name="stock"
value="<?= $p['stock_qty'] ?>">

<label>Description</label>
<textarea name="desc"><?= htmlspecialchars($p['description']) ?></textarea>

<button class="btn">Update Product</button>

</form>

</section>

<?php include "../../includes/footer.php"; ?>