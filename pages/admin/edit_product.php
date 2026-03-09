<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

$code = $_GET['code'] ?? '';

$stmt = mysqli_prepare($conn,"
SELECT *
FROM products
WHERE product_code=?
");

mysqli_stmt_bind_param($stmt,"s",$code);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$p = mysqli_fetch_assoc($result);

include "../../includes/header.php";
?>

<section>

<h2 class="section-title">Edit Product</h2>

<form method="post" action="update_product.php" class="admin-form">

<input type="hidden" name="csrf" value="<?= csrf_token() ?>">
<input type="hidden" name="code" value="<?= $p['product_code'] ?>">

<label>Product Code</label>
<input type="text" value="<?= $p['product_code'] ?>" disabled>

<label>Category Number</label>
<input type="number"
name="category"
value="<?= $p['category_num'] ?>"
min="1"
max="6"
required>

<label>Product Name</label>
<input type="text"
name="name"
value="<?= htmlspecialchars($p['product_name']) ?>"
required>

<label>Price</label>
<input type="number"
name="price"
value="<?= $p['price'] ?>"
min="0"
step="0.01"
required>

<label>Stock Quantity</label>
<input type="number"
name="stock"
value="<?= $p['stock_qty'] ?>"
min="0"
required>

<label>Color</label>
<input type="text"
name="color"
value="<?= htmlspecialchars($p['color']) ?>">

<label>Description</label>
<textarea name="desc" rows="4"><?= htmlspecialchars($p['description']) ?></textarea>

<label>Featured Product</label>
<select name="featured">

<option value="0" <?= $p['is_featured'] ? "" : "selected" ?>>No</option>
<option value="1" <?= $p['is_featured'] ? "selected" : "" ?>>Yes</option>

</select>

<label>Active Product</label>
<select name="active">

<option value="1" <?= $p['is_active'] ? "selected" : "" ?>>Active</option>
<option value="0" <?= $p['is_active'] ? "" : "selected" ?>>Inactive</option>

</select>

<button class="btn">Update Product</button>

</form>

</section>

<?php include "../../includes/footer.php"; ?>