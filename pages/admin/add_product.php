<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";
?>

<section>

<h2 class="section-title">Add Product</h2>

<form method="post" action="insert_product.php" class="admin-form">

<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<label>Product Code</label>
<input type="text" name="code" required>

<label>Category Number</label>
<input type="number" name="category" min="1" max="6" required>

<label>Product Name</label>
<input type="text" name="name" required>

<label>Price</label>
<input type="number" name="price" min="0" step="0.01" required>

<label>Stock Quantity</label>
<input type="number" name="stock" min="0" required>

<label>Color</label>
<input type="text" name="color">

<label>Description</label>
<textarea name="desc" rows="4"></textarea>

<label>Featured Product</label>
<select name="featured">
<option value="0">No</option>
<option value="1">Yes</option>
</select>

<label>Active Product</label>
<select name="active">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>

<button class="btn">Add Product</button>

</form>

</section>

<?php include "../../includes/footer.php"; ?>