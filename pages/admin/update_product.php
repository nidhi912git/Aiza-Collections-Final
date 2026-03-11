<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

/* GET FORM DATA */

$code     = $_POST['code'] ?? '';
$category = intval($_POST['category'] ?? 0);
$name     = trim($_POST['name'] ?? '');
$price    = floatval($_POST['price'] ?? 0);
$color    = trim($_POST['color'] ?? '');
$desc     = trim($_POST['desc'] ?? '');
$featured = intval($_POST['featured'] ?? 0);
$active   = intval($_POST['active'] ?? 1);

/* SIZE STOCK */

$stock_S   = intval($_POST['stock_S'] ?? 0);
$stock_M   = intval($_POST['stock_M'] ?? 0);
$stock_L   = intval($_POST['stock_L'] ?? 0);
$stock_XL  = intval($_POST['stock_XL'] ?? 0);
$stock_XXL = intval($_POST['stock_XXL'] ?? 0);

/* UPDATE PRODUCT INFO */

$stmt = mysqli_prepare($conn,"
UPDATE products
SET
category_num = ?,
product_name = ?,
description = ?,
price = ?,
color = ?,
is_featured = ?,
is_active = ?
WHERE product_code = ?
");

mysqli_stmt_bind_param(
$stmt,
"issdsiis",
$category,
$name,
$desc,
$price,
$color,
$featured,
$active,
$code
);

mysqli_stmt_execute($stmt);


/* UPDATE SIZE STOCK */

$stocks = [
"S"=>$stock_S,
"M"=>$stock_M,
"L"=>$stock_L,
"XL"=>$stock_XL,
"XXL"=>$stock_XXL
];

foreach($stocks as $size=>$qty){

$stmt2 = mysqli_prepare($conn,"
UPDATE product_stock
SET stock_qty=?
WHERE product_code=? AND size=?
");

mysqli_stmt_bind_param($stmt2,"iss",$qty,$code,$size);

mysqli_stmt_execute($stmt2);

}

/* SUCCESS MESSAGE */

$_SESSION['popup'] = "Product updated successfully.";

/* REDIRECT */

header("Location: products.php");
exit;
?>