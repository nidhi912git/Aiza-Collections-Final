<?php
session_start();
include "../../includes/config.php";
include "../../includes/header.php";

/* GET PRODUCTS FOR DROPDOWN */
$products = mysqli_query($conn,"
SELECT product_code, product_name
FROM products
ORDER BY product_name
");
?>

<section>

<h2 class="section-title">Upload Product Image</h2>

<form method="POST" enctype="multipart/form-data" class="admin-form">

<label>Select Product</label>

<select name="product_code" required>

<option value="">Choose Product</option>

<?php while($p=mysqli_fetch_assoc($products)): ?>

<option value="<?= $p['product_code'] ?>">
<?= $p['product_name'] ?> (<?= $p['product_code'] ?>)
</option>

<?php endwhile; ?>

</select>

<label>Select Image</label>

<input type="file" name="image" accept="image/*" required>

<button class="btn" name="upload_image">
Upload Image
</button>

</form>

</section>

<?php

/* HANDLE UPLOAD */

if(isset($_POST['upload_image'])){

$product_code = $_POST['product_code'];

$file = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$path = "../../assets/products/".$file;

/* MOVE IMAGE */

move_uploaded_file($tmp,$path);

/* SAVE TO DATABASE */

mysqli_query($conn,"
INSERT INTO product_images (product_code,image_path)
VALUES ('$product_code','products/$file')
");

echo "<script>
alert('Image Uploaded Successfully');
window.location='upload_product_image.php';
</script>";

}

?>

<?php include "../../includes/footer.php"; ?>