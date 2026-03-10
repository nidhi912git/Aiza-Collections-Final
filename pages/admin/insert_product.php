<?php

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

$code=$_POST['code'];
$category=$_POST['category'];
$name=$_POST['name'];
$price=$_POST['price'];
$color=$_POST['color'];
$desc=$_POST['desc'];
$featured=$_POST['featured'];
$active=$_POST['active'];
$stock=$_POST['stock'];

mysqli_query($conn,"
INSERT INTO products
(product_code,category_num,product_name,description,price,color,is_featured,is_active)
VALUES
('$code','$category','$name','$desc','$price','$color','$featured','$active')
");

/* CREATE SIZE STOCK */

$sizes=['S','M','L','XL','XXL'];

foreach($sizes as $s){

mysqli_query($conn,"
INSERT INTO product_stock(product_code,size,stock_qty)
VALUES('$code','$s','$stock')
");

}

header("Location: products.php");
exit;