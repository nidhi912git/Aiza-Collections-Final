<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

$code = $_POST['code'] ?? '';

if(!$code){
header("Location: products.php");
exit;
}

$stmt = mysqli_prepare($conn,"
DELETE FROM products
WHERE product_code=?
");

mysqli_stmt_bind_param($stmt,"s",$code);
mysqli_stmt_execute($stmt);

header("Location: products.php");
exit;
?>