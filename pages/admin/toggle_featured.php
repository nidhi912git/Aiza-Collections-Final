<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

$code = $_POST['code'] ?? '';

if (!$code) {
    header("Location: products.php");
    exit;
}

$stmt = mysqli_prepare($conn, "
UPDATE products
SET is_featured = NOT is_featured
WHERE product_code = ?
");

mysqli_stmt_bind_param($stmt, "s", $code);
mysqli_stmt_execute($stmt);

$_SESSION['popup'] = "Featured status updated.";

header("Location: products.php");
exit;
