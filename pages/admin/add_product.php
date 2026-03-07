<?php
$page_id = "admin-page";
include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";
?>

<section>

<h2>Add Product</h2>

<form method="post" action="insert_product.php" class="admin-form">
    

<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<label>Product Code</label>
<input type="text" name="code">

<label>Name</label>
<input type="text" name="name">

<label>Price</label>
<input type="number" name="price">

<label>Stock</label>
<input type="number" name="stock">

<label>Description</label>
<textarea name="desc"></textarea>

<button class="btn">Add Product</button>

</form>

</section>

<?php include "../../includes/footer.php"; ?>