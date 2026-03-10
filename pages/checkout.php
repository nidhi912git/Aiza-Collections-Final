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

echo "
<div style='text-align:center;margin-top:40px;'>

<p>Your cart is empty.</p>

<a href='/aiza-collections-final/pages/catalog.php'
class='btn'>
Browse Products
</a>

</div>";

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

if($p){
$total += $p['price'] * $qty;
}

}


/* CREATE ORDER */

mysqli_query($conn,"
INSERT INTO orders(user_id,order_total)
VALUES('$user_id','$total')
");

$order_id = mysqli_insert_id($conn);


/* INSERT ORDER ITEMS + REDUCE STOCK */

foreach($cart as $key=>$qty){
$code = explode("_",$key)[0];

$q = mysqli_query($conn,"
SELECT price
FROM products
WHERE product_code='$code'
");

$p = mysqli_fetch_assoc($q);

if(!$p) continue;

$price = $p['price'];

/* INSERT ORDER ITEM */

mysqli_query($conn,"
INSERT INTO order_items(order_id,product_code,quantity,price)
VALUES('$order_id','$code','$qty','$price')
");

/*stock check before placing order*/
$checkStock = mysqli_query($conn,"
SELECT stock_qty
FROM product_stock
WHERE product_code='$code'
AND size='$size'
");

$stock = mysqli_fetch_assoc($checkStock)['stock_qty'];

if($stock < $qty){
die("Not enough stock available.");
}

/* REDUCE PRODUCT STOCK */

mysqli_query($conn,"
UPDATE product_stock
SET stock_qty = stock_qty - $qty
WHERE product_code='$code'
AND size='$size'
");

}


/* CLEAR CART */

unset($_SESSION['cart']);


/* SUCCESS MESSAGE */

$_SESSION['popup'] = "Order placed successfully!";


/* REDIRECT TO ORDERS PAGE */

header("Location: /aiza-collections-final/pages/orders.php");
exit;

?>