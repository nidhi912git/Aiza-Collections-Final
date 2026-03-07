<?php
$page_id="order-details-page";

include "../includes/config.php";
include "../includes/header.php";

/* user must be logged in */
if(!isset($_SESSION['user'])){
header("Location: /aiza-collections-final/pages/login.php");
exit;
}

/* get order id from url */
$order_id = intval($_GET['id']);
$user_id = $_SESSION['user']['user_id'];

/* check order belongs to this user */
$order = mysqli_query($conn,"
SELECT *
FROM orders
WHERE id='$order_id'
AND user_id='$user_id'
");

if(mysqli_num_rows($order)==0){
echo "<p style='text-align:center;'>Order not found.</p>";
include "../includes/footer.php";
exit;
}

/* get order items */
$items = mysqli_query($conn,"
SELECT oi.*,p.product_name,MIN(i.image_path) image_path
FROM order_items oi
LEFT JOIN products p ON oi.product_code=p.product_code
LEFT JOIN product_images i ON p.product_code=i.product_code
WHERE oi.order_id='$order_id'
GROUP BY oi.id
");

$total = 0;
?>

<section>

<h2 class="section-title">Order #<?= $order_id ?></h2>

<div class="order-items">

<?php while($item=mysqli_fetch_assoc($items)):

$sub = $item['price'] * $item['quantity'];
$total += $sub;
?>

<div class="order-item">

<img
src="/aiza-collections-final/assets/<?= $item['image_path'] ?>"
class="order-img">

<div class="order-info">

<h4><?= $item['product_name'] ?></h4>

<p>Size: <?= $item['size'] ?></p>

<p>Quantity: <?= $item['quantity'] ?></p>

<p>Price: ₹<?= $item['price'] ?></p>

<p class="order-subtotal">
Subtotal ₹<?= $sub ?>
</p>

</div>

</div>

<?php endwhile; ?>

</div>

<h3 style="text-align:center;margin-top:30px;">
Order Total ₹<?= $total ?>
</h3>

</section>

<?php include "../includes/footer.php"; ?>