<?php
$page_id="order-details-page";

include "../includes/config.php";
include "../includes/header.php";

/* USER MUST BE LOGGED IN */

if(!isset($_SESSION['user'])){
header("Location: /aiza-collections-final/pages/login.php");
exit;
}

$user_id = $_SESSION['user']['user_id'];
$order_id = intval($_GET['id'] ?? 0);

/* VERIFY ORDER BELONGS TO USER */

$orderQ = mysqli_query($conn,"
SELECT *
FROM orders
WHERE order_id='$order_id'
AND user_id='$user_id'
");

if(mysqli_num_rows($orderQ)==0){

echo "<p style='text-align:center;'>Order not found.</p>";

include "../includes/footer.php";
exit;

}

/* GET ORDER ITEMS */

$items = mysqli_query($conn,"
SELECT
oi.*,
p.product_name,
MIN(i.image_path) AS image_path
FROM order_items oi
LEFT JOIN products p
ON oi.product_code=p.product_code
LEFT JOIN product_images i
ON p.product_code=i.product_code
WHERE oi.order_id='$order_id'
GROUP BY oi.product_code
");

$total = 0;
?>

<section>

<h2 class="section-title">
Order #<?= $order_id ?>
</h2>

<div class="list-container">

<?php while($item=mysqli_fetch_assoc($items)):

$sub = $item['price'] * $item['quantity'];
$total += $sub;

?>

<div class="list-card">

<img
src="<?= imgPath($item['image_path'] ?? 'no-image.jpg') ?>"
class="list-img"
>

<div class="list-info">

<div class="list-main">

<h4>
<?= htmlspecialchars($item['product_name']) ?>
</h4>

</div>

<div class="list-meta">

<span class="price">
₹<?= number_format($item['price']) ?>
</span>

<span>
Qty: <?= $item['quantity'] ?>
</span>

<?php if(!empty($item['size'])): ?>

<span>
Size: <?= htmlspecialchars($item['size']) ?>
</span>

<?php endif; ?>

</div>

<p class="list-subtotal">
Subtotal ₹<?= number_format($sub) ?>
</p>

<p>
Status:
<?= $item['item_status'] ?? 'Placed' ?>
</p>

</div>

<div class="list-actions">

<?php if(($item['item_status'] ?? 'Placed')=='Placed'): ?>

<form
method="POST"
action="/aiza-collections-final/pages/cancel_item.php"
onsubmit="return confirmCancel()"
>

<input
type="hidden"
name="item_id"
value="<?= $item['item_id'] ?>"
>

<button class="action-btn">
Cancel Item
</button>

</form>

<?php endif; ?>

</div>

</div>

<?php endwhile; ?>

</div>

<h3 style="text-align:center;margin-top:30px;">

Order Total ₹<?= number_format($total) ?>

</h3>

<div style="text-align:center;margin-top:25px;">

<a
href="/aiza-collections-final/pages/orders.php"
class="btn"
>

Back to Orders

</a>

</div>

</section>
<script id="x6yprl">
function confirmCancel(){

return confirm(
"Are you sure you want to cancel this order item?\n\nYou cannot undo this change."
);

}
</script>

<?php include "../includes/footer.php"; ?>