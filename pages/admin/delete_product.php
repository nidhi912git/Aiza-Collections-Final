<?php
$page_id = "admin-page";
include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

$code=$_POST['code'] ?? '';

mysqli_query($conn,
"DELETE FROM products
WHERE product_code='$code'");

header("Location: products.php");
exit;