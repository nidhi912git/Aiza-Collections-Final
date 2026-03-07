<?php
session_start();
include "../../includes/config.php";
include "../../includes/header.php";

$order_id = intval($_GET['id']);

/* GET ORDER DETAILS */
$order_query = mysqli_query($conn,"
SELECT * FROM orders WHERE order_id=$order_id
");

$order = mysqli_fetch_assoc($order_query);

/* GET ORDER ITEMS */
$items_query = mysqli_query($conn,"
SELECT oi.*,p.product_name
FROM order_items oi
JOIN products p ON oi.product_id=p.product_id
WHERE oi.order_id=$order_id
");
?>

<section>

<h2 class="section-title">Order #<?= $order_id ?></h2>

<div class="order-info">

<p><strong>Customer:</strong> <?= $order['customer_name'] ?></p>

<p><strong>Date:</strong>
<?= date("d M Y",strtotime($order['order_date'])) ?>
</p>

<p><strong>Status:</strong>
<span class="status status-<?= strtolower($order['order_status']) ?>">
<?= $order['order_status'] ?>
</span>
</p>

</div>

<h3>Items Ordered</h3>

<table class="admin-table">

<tr>
<th>Product</th>
<th>Size</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
</tr>

<?php while($item=mysqli_fetch_assoc($items_query)): ?>

<tr>

<td><?= $item['product_name'] ?></td>

<td><?= $item['size'] ?></td>

<td><?= $item['quantity'] ?></td>

<td>₹<?= $item['price'] ?></td>

<td>₹<?= $item['price'] * $item['quantity'] ?></td>

</tr>

<?php endwhile; ?>

</table>

<h3 style="margin-top:20px;">
Total: ₹<?= $order['order_total'] ?>
</h3>

<hr>

<h3>Update Order Status</h3>

<form method="POST">

<select name="status">

<option value="Pending">Pending</option>

<option value="Processing">Processing</option>

<option value="Shipped">Shipped</option>

<option value="Completed">Completed</option>

</select>

<button class="btn" name="update_status">
Update
</button>

</form>

</section>

<?php

/* UPDATE STATUS */
if(isset($_POST['update_status'])){

$status = $_POST['status'];

mysqli_query($conn,"
UPDATE orders
SET order_status='$status'
WHERE order_id=$order_id
");

echo "<script>
alert('Status Updated');
window.location='orders_panel.php';
</script>";

}

?>

<?php include "../../includes/footer.php"; ?>VIEW ORDER