<?php
$page_id = "admin-page";
include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

$code=$_POST['code'];
$name=$_POST['name'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$desc=$_POST['desc'];

$stmt=mysqli_prepare($conn,
"UPDATE products
SET product_name=?,price=?,stock_qty=?,description=?
WHERE product_code=?");

mysqli_stmt_bind_param($stmt,
"sisss",$name,$price,$stock,$desc,$code);

mysqli_stmt_execute($stmt);

header("Location: products.php");
exit;