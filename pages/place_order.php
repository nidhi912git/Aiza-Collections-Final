<?php
$page_id = "place-order";
include "../partials/header.php";
include "../config/db.php";

if(!is_logged_in()){
header("Location: login.php");
exit;
}

if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
echo "<p>Your cart is empty</p>";
exit;
}

$user_id = $_SESSION['user']['id'];
$total = 0;

/* calculate total */
foreach($_SESSION['cart'] as $product_id => $qty){

$stmt = $conn->prepare("SELECT price FROM products WHERE id=?");
$stmt->bind_param("i",$product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

$total += $product['price'] * $qty;
}

/* insert order */

$stmt = $conn->prepare("INSERT INTO orders(user_id,total_price) VALUES(?,?)");
$stmt->bind_param("id",$user_id,$total);
$stmt->execute();

$order_id = $stmt->insert_id;

/* insert order items */

foreach($_SESSION['cart'] as $product_id => $qty){

$stmt = $conn->prepare("SELECT price FROM products WHERE id=?");
$stmt->bind_param("i",$product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

$price = $product['price'];

$stmt2 = $conn->prepare("INSERT INTO order_items(order_id,product_id,quantity,price) VALUES(?,?,?,?)");

$stmt2->bind_param("iiid",$order_id,$product_id,$qty,$price);
$stmt2->execute();
}

/* clear cart */
unset($_SESSION['cart']);
?>

<div class="order-success">

<h2>Order Placed Successfully 🎉</h2>

<p>Your order ID: <b>#<?= $order_id ?></b></p>

<a href="orders.php" class="view-orders-btn">
View My Orders
</a>

</div>

<?php include "../partials/footer.php"; ?>