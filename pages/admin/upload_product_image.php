<?php

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

$product=$_POST['product_code'];

$file=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

$path="../../assets/images/".$file;

move_uploaded_file($tmp,$path);

$db="images/".$file;

mysqli_query($conn,"
INSERT INTO product_images(product_code,image_path)
VALUES('$product','$db')
");

header("Location: upload_product_image.php");
exit;