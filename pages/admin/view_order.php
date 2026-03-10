<?php
$page_id="admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

$order_id = intval($_GET['id'] ?? 0);

/* UPDATE STATUS */

if(isset($_POST['update_status'])){

verify_csrf();

$status = mysqli_real_escape_string($conn,$_POST['status']);

mysqli_query($conn,"
UPDATE orders
SET order_status='$status'
WHERE order_id='$order_id'
");

header("Location: orders_panel.php");
exit;

}

include "../../includes/header.php";

/* GET ORDER DETAILS */

$order_query = mysqli_query($conn,"
SELECT 
o.order_id,
o.order_total,
o.order_status,
o.created_at,
u.name
FROM orders o
LEFT JOIN users u
ON o.user_id = u.user_id
WHERE o.order_id = '$order_id'
");

$order = mysqli_fetch_assoc($order_query);

if(!$order){

echo "<p style='text-align:center;'>Order not found</p>";
include "../../includes/footer.php";
exit;

}

/* GET ORDER ITEMS */

$items_query = mysqli_query($conn,"
SELECT 
oi.product_code,
oi.size,
oi.quantity,
oi.price,
p.product_name
FROM order_items oi
JOIN products p
ON oi.product_code = p.product_code
WHERE oi.order_id = '$order_id'
");
?>

<section class="order-view-container">

<h2 class="section-title">Order #<?= $order_id ?></h2>

<div class="order-info">

<p><strong>Customer:</strong> <?= htmlspecialchars($order['name']) ?></p>
<p><strong>Date:</strong> <?= date("d M Y",strtotime($order['created_at'])) ?></p>
<p><strong>Status:</strong> <?= $order['order_status'] ?></p>

</div>


<h3>Items Ordered</h3>

<table class="order-items-table">

<tr>
<th>Product</th>
<th>Size</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
</tr>

<?php while($item=mysqli_fetch_assoc($items_query)): ?>

<tr>

<td><?= htmlspecialchars($item['product_name']) ?></td>

<td><?= htmlspecialchars($item['size'] ?? '-') ?></td>

<td><?= $item['quantity'] ?></td>

<td>₹<?= number_format($item['price']) ?></td>

<td>₹<?= number_format($item['price'] * $item['quantity']) ?></td>

</tr>

<?php endwhile; ?>

</table>


<p class="order-total">
Total: ₹<?= number_format($order['order_total']) ?>
</p>

<hr>

<div class="order-status-update">

<h3>Update Order Status</h3>

<div class="custom-dropdown">

<div class="dropdown-selected">
Select Status
</div>

<div class="dropdown-menu">
<div class="dropdown-item">Placed</div>
<div class="dropdown-item">Processing</div>
<div class="dropdown-item">Shipped</div>
<div class="dropdown-item">Delivered</div>
<div class="dropdown-item">Cancelled</div>
</div>

<input type="hidden" name="status" id="statusInput">

</div>

<button class="btn">Update Status</button>

</div>

</section>

<?php include "../../includes/footer.php"; ?>