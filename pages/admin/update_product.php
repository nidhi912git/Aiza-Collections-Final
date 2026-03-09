<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

/* GET FORM DATA */

$code     = $_POST['code'] ?? '';
$category = $_POST['category'] ?? 0;
$name     = $_POST['name'] ?? '';
$price    = $_POST['price'] ?? 0;
$stock    = $_POST['stock'] ?? 0;
$color    = $_POST['color'] ?? '';
$desc     = $_POST['desc'] ?? '';
$featured = $_POST['featured'] ?? 0;
$active   = $_POST['active'] ?? 1;


/* UPDATE PRODUCT */

$stmt = mysqli_prepare($conn,"
UPDATE products
SET
category_num = ?,
product_name = ?,
description = ?,
price = ?,
color = ?,
stock_qty = ?,
is_featured = ?,
is_active = ?
WHERE product_code = ?
");

mysqli_stmt_bind_param(
$stmt,
"issdsiiis",
$category,
$name,
$desc,
$price,
$color,
$stock,
$featured,
$active,
$code
);

mysqli_stmt_execute($stmt);


/* REDIRECT */

header("Location: products.php");
exit;

?>