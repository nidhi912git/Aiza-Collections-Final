<?php
$page_id="orders-page";

include "../includes/config.php";
include "../includes/header.php";

if(!isset($_SESSION['user'])){
header("Location: /aiza-collections-final/pages/login.php");
exit;
}

$user_id = $_SESSION['user']['user_id'];

$result = mysqli_query($conn,"
SELECT *
FROM orders
WHERE user_id='$user_id'
ORDER BY created_at DESC
");
?>

<section>

<h2 class="section-title">My Orders</h2>

<?php if(mysqli_num_rows($result)==0): ?>

<p style="text-align:center;">You haven't placed any orders yet.</p>

<?php else: ?>

<div class="orders-container">

<?php while($row=mysqli_fetch_assoc($result)): ?>

<div class="order-card">

<h3>Order #<?= $row['order_id'] ?></h3>

<p>
<strong>Total:</strong>
₹<?= number_format($row['order_total']) ?>
</p>

<p>
<strong>Date:</strong>
<?= date("d M Y",strtotime($row['created_at'])) ?>
</p>

<p>
<strong>Status:</strong>
<?= $row['order_status'] ?>
</p>

<a class="btn"
href="/aiza-collections-final/pages/order_details.php?id=<?= $row['order_id'] ?>">
View Details
</a>

</div>

<?php endwhile; ?>

</div>

<?php endif; ?>

</section>

<?php include "../includes/footer.php"; ?>