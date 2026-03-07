<?php
$page_id="checkout-page";

include "../includes/config.php";
include "../includes/header.php";

/* user must be logged in */
if(!isset($_SESSION['user'])){
header("Location: /aiza-collections-final/pages/login.php");
exit;
}

/* get cart */
$cart = $_SESSION['cart'] ?? [];

if(!$cart){
echo "<p style='text-align:center;'>Your cart is empty.</p>";
include "../includes/footer.php";
exit;
}

$user_id = $_SESSION['user']['user_id'];

$total = 0;

/* calculate total */
foreach($cart as $key=>$qty){

list($code,$size) = explode("_",$key);

$q = mysqli_query($conn,"
SELECT price
FROM products
WHERE product_code='$code'
");

$p = mysqli_fetch_assoc($q);

$total += $p['price'] * $qty;
}

/* create order */
mysqli_query($conn,"
INSERT INTO orders(user_id,total_price)
VALUES('$user_id','$total')
");

$order_id = mysqli_insert_id($conn);

/* insert order items */

foreach($cart as $key=>$qty){

list($code,$size) = explode("_",$key);

$q = mysqli_query($conn,"
SELECT price
FROM products
WHERE product_code='$code'
");

$p = mysqli_fetch_assoc($q);

$price = $p['price'];

mysqli_query($conn,"
INSERT INTO order_items(order_id,product_code,size,quantity,price)
VALUES('$order_id','$code','$size','$qty','$price')
");
}

/* clear cart after order */
unset($_SESSION['cart']);

/* redirect to orders page */
header("Location: /aiza-collections-final/pages/orders.php");
exit;
?>