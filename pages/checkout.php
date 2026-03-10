<?php
$page_id="checkout-page";

include "../includes/config.php";
include "../includes/header.php";

/* USER MUST BE LOGGED IN */

if(!isset($_SESSION['user'])){
header("Location: /aiza-collections-final/pages/login.php");
exit;
}


/* GET CART */

$cart = $_SESSION['cart'] ?? [];

if(!$cart){

echo "<p style='text-align:center;'>Your cart is empty.</p>";

include "../includes/footer.php";

exit;

}


$user_id = $_SESSION['user']['user_id'];

$total = 0;


/* CALCULATE TOTAL */

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


/* CREATE ORDER */

mysqli_query($conn,"
INSERT INTO orders(user_id,order_total)
VALUES('$user_id','$total')
");

$order_id = mysqli_insert_id($conn);


/* INSERT ORDER ITEMS + REDUCE STOCK */

foreach($cart as $key=>$qty){

list($code,$size) = explode("_",$key);

$q = mysqli_query($conn,"
SELECT price
FROM products
WHERE product_code='$code'
");

$p = mysqli_fetch_assoc($q);

$price = $p['price'];
/* INSERT ORDER ITEM */
mysqli_query($conn,"
INSERT INTO order_items(order_id,product_code,size,quantity,price)
VALUES('$order_id','$code','$size','$qty','$price')
");

/* REDUCE PRODUCT STOCK */
mysqli_query($conn,"
UPDATE products
SET stock_qty = stock_qty - $qty
WHERE product_code='$code'
");

}

/* CLEAR CART */

unset($_SESSION['cart']);


/* SUCCESS MESSAGE */

$_SESSION['popup'] = "Order placed successfully!";


/* REDIRECT */

header("Location: /aiza-collections-final/pages/orders.php");

exit;

?>