<?php
include "../../includes/config.php";
include "../../includes/security.php";
require_admin();
verify_csrf();

$stmt = mysqli_prepare($conn,
"UPDATE products SET is_featured = NOT is_featured WHERE product_code=?");

mysqli_stmt_bind_param($stmt,"s",$_POST['code']);
mysqli_stmt_execute($stmt);
mysqli_query($conn,
  "UPDATE products SET is_featured = NOT is_featured WHERE product_code='$code'"
);

header("Location: products.php");
exit;