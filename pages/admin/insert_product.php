<?php

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

/* GET FORM DATA SAFELY */

$code     = trim($_POST['code'] ?? '');
$category = intval($_POST['category'] ?? 0);
$name     = trim($_POST['name'] ?? '');
$price    = floatval($_POST['price'] ?? 0);
$color    = trim($_POST['color'] ?? '');
$desc     = trim($_POST['desc'] ?? '');
$featured = intval($_POST['featured'] ?? 0);
$active   = intval($_POST['active'] ?? 1);
$stock    = intval($_POST['stock'] ?? 0);

/* BASIC VALIDATION */

if(!$code || !$name || $price < 0){

$_SESSION['popup']="Invalid product data.";

header("Location: add_product.php");
exit;

}

/* CHECK IF PRODUCT CODE EXISTS */

$stmt = mysqli_prepare($conn,"
SELECT product_code
FROM products
WHERE product_code=?
");

mysqli_stmt_bind_param($stmt,"s",$code);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) > 0){

$_SESSION['popup']="Product code already exists.";

header("Location: add_product.php");
exit;

}

/* INSERT PRODUCT */

$stmt = mysqli_prepare($conn,"
INSERT INTO products
(product_code,category_num,product_name,description,price,color,is_featured,is_active)
VALUES (?,?,?,?,?,?,?,?)
");

mysqli_stmt_bind_param(
$stmt,
"sissdsii",
$code,
$category,
$name,
$desc,
$price,
$color,
$featured,
$active
);

mysqli_stmt_execute($stmt);

/* CREATE SIZE STOCK */

$sizes = ['S','M','L','XL','XXL'];

foreach($sizes as $size){

$stmt2 = mysqli_prepare($conn,"
INSERT INTO product_stock(product_code,size,stock_qty)
VALUES(?,?,?)
");

mysqli_stmt_bind_param($stmt2,"ssi",$code,$size,$stock);

mysqli_stmt_execute($stmt2);

}

/* SUCCESS MESSAGE */

$_SESSION['popup']="Product added successfully.";

/* REDIRECT */

header("Location: products.php");
exit;

?>