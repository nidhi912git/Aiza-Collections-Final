<?php

$page_id="admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

/* GET PRODUCT */

$product = $_POST['product_code'] ?? '';

if(!$product){
header("Location: upload_product_image.php");
exit;
}

/* CHECK FILE */

if(!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK){
die("Image upload failed.");
}

/* FILE INFO */

$file = $_FILES['image']['name'];
$tmp  = $_FILES['image']['tmp_name'];

$ext = strtolower(pathinfo($file,PATHINFO_EXTENSION));

$allowed = ['jpg','jpeg','png','webp'];

if(!in_array($ext,$allowed)){
die("Invalid image format.");
}

/* CREATE UNIQUE FILE */

$newName = uniqid("prod_").".".$ext;

$uploadDir = "../../assets/images/";

if(!is_dir($uploadDir)){
mkdir($uploadDir,0755,true);
}

$uploadPath = $uploadDir.$newName;

if(!move_uploaded_file($tmp,$uploadPath)){
die("Failed to save uploaded file.");
}

/* SAVE IN DATABASE */

$dbPath = "images/".$newName;

$stmt = mysqli_prepare($conn,"
INSERT INTO product_images(product_code,image_path)
VALUES(?,?)
");

mysqli_stmt_bind_param($stmt,"ss",$product,$dbPath);
mysqli_stmt_execute($stmt);

/* REDIRECT */

header("Location: upload_product_image.php");
exit;