<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* GET ALL ORDERS */

$q = mysqli_query($conn,"
SELECT
o.order_id,
o.order_total,
o.order_status,
o.created_at,
u.name
FROM orders o
LEFT JOIN users u
ON o.user_id = u.user_id
ORDER BY o.created_at DESC
");

?>

<section>

<h2 class="section-title">Orders Panel</h2>

<div class="orders-table-container">

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

<td><?= htmlspecialchars($row['name']) ?></td>

<td><?= date("d M Y",strtotime($row['created_at'])) ?></td>

<td>₹<?= number_format($row['order_total']) ?></td>

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