<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

/* GET PRODUCT CODE */

$code = $_POST['code'] ?? '';

if (!$code) {
    header("Location: products.php");
    exit;
}

/* DELETE PRODUCT IMAGES */

$stmt1 = mysqli_prepare($conn, "
DELETE FROM product_images
WHERE product_code = ?
");

mysqli_stmt_bind_param($stmt1, "s", $code);
mysqli_stmt_execute($stmt1);

/* DELETE PRODUCT STOCK */

$stmt2 = mysqli_prepare($conn, "
DELETE FROM product_stock
WHERE product_code = ?
");

mysqli_stmt_bind_param($stmt2, "s", $code);
mysqli_stmt_execute($stmt2);

/* DELETE PRODUCT */

$stmt3 = mysqli_prepare($conn, "
DELETE FROM products
WHERE product_code = ?
");

mysqli_stmt_bind_param($stmt3, "s", $code);
mysqli_stmt_execute($stmt3);

/* SUCCESS MESSAGE */

$_SESSION['popup'] = "Product deleted successfully.";

/* REDIRECT */

header("Location: products.php");
exit;
