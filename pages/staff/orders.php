<?php
$page_id="staff-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_staff();

include "../../includes/header.php";

$q=mysqli_query($conn,"
SELECT order_id,order_total,order_status,created_at
FROM orders
ORDER BY created_at DESC
");
?>

<section>

<h2 class="section-title">Orders</h2>

<table class="admin-table">

<tr>
<th>Order</th>
<th>Date</th>
<th>Total</th>
<th>Status</th>
<th>Update</th>
</tr>

<?php while($o=mysqli_fetch_assoc($q)): ?>

<tr>

<td>#<?= $o['order_id'] ?></td>
<td><?= date("d M Y",strtotime($o['created_at'])) ?></td>
<td>₹<?= number_format($o['order_total']) ?></td>
<td><?= $o['order_status'] ?></td>

<td>

<a class="btn small-btn"
href="update_order_status.php?id=<?= $o['order_id'] ?>">
Update
</a>

</td>

</tr>

<?php endwhile; ?>

</table>

</section>

<?php include "../../includes/footer.php"; ?>