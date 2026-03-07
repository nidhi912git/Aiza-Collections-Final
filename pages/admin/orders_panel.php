<?php
session_start();
include "../../includes/config.php";
include "../../includes/header.php";

/* GET ALL ORDERS */
$q=mysqli_query($conn,"
SELECT order_id,customer_name,order_date,order_total,order_status
FROM orders
ORDER BY order_date DESC
");
?>

<section>

<h2 class="section-title">Orders Panel</h2>

<div class="admin-table-wrap">

<table class="admin-table">

<tr>
<th>Order ID</th>
<th>Customer</th>
<th>Date</th>
<th>Total</th>
<th>Status</th>
<th>View</th>
</tr>

<?php while($row=mysqli_fetch_assoc($q)): ?>

<tr>

<td>#<?= $row['order_id'] ?></td>

<td><?= $row['customer_name'] ?></td>

<td><?= date("d M Y",strtotime($row['order_date'])) ?></td>

<td>₹<?= $row['order_total'] ?></td>

<td>
<span class="status status-<?= strtolower($row['order_status']) ?>">
<?= $row['order_status'] ?>
</span>
</td>

<td>
<a class="btn small-btn"
href="view_order.php?id=<?= $row['order_id'] ?>">
View
</a>
</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</section>

<?php include "../../includes/footer.php"; ?>