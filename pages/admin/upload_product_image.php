<?php
$page_id="admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

$product_code = $_POST['product_code'] ?? '';

if(!$product_code || !isset($_FILES['image'])){
header("Location: upload_product_image.php");
exit;
}

/* FILE DATA */

$file = $_FILES['image']['name'];
$tmp  = $_FILES['image']['tmp_name'];

/* SAVE LOCATION */

$upload_dir = "../../assets/images/";
$path = $upload_dir . $file;

/* MOVE FILE */

move_uploaded_file($tmp,$path);

/* UPDATE DATABASE IMAGE PATH */

$stmt = mysqli_prepare($conn,"
UPDATE product_images
SET image_path = ?
WHERE product_code = ?
LIMIT 1
");

$db_path = "images/".$file;

mysqli_stmt_bind_param($stmt,"ss",$db_path,$product_code);
mysqli_stmt_execute($stmt);

header("Location: upload_product_image.php");
exit;
?>