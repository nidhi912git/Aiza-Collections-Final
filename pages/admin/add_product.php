<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";
?>

<section>

    <h2 class="section-title">Add Product</h2>

    <form method="post" action="insert_product.php" class="admin-form" enctype="multipart/form-data">

        <input type="hidden" name="csrf" value="<?= csrf_token() ?>">

        <label>Product Code</label>
        <input
            type="text"
            name="code"
            placeholder="Example: A1, C3, SH2"
            required
            pattern="[A-Za-z0-9]+"
            title="Only letters and numbers allowed">

        <label>Category Number</label>
        <input
            type="number"
            name="category"
            min="1"
            max="6"
            required>

        <label>Product Name</label>
        <input
            type="text"
            name="name"
            required>

        <label>Price (₹)</label>
        <input
            type="number"
            name="price"
            min="0"
            step="100"
            required>

        <label>Initial Stock Per Size</label>

         <input type="number" name="stock[S]" value="15">
         <input type="number" name="stock[M]" value="15">
         <input type="number" name="stock[L]" value="15">
         <input type="number" name="stock[XL]" value="15">
         <input type="number" name="stock[XXL]" value="15">

        <p style="font-size:13px;color:#666;margin-top:-6px;margin-bottom:10px;">
            Stock will be created for sizes: S, M, L, XL, XXL
        </p>

        <label>Description</label>
        <textarea
            name="desc"
            rows="4"
            placeholder="Short description of the product"></textarea>

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

        <label>Product Images (1 to 5)</label>
         <input 
           type="file" 
           name="images[]" 
           accept=".jpg,.jpeg,.png" 
           multiple 
           required>

         <p style="font-size:13px;color:#666;">
           Upload 1 to 5 images (JPG, JPEG, PNG only, max 150KB each)
         </p>

        <button class="btn">
            Add Product
        </button>

    </form>

</section>

<?php include "../../includes/footer.php"; ?>