<?php
$page_id="staff-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_staff();

$order_id=intval($_GET['id'] ?? 0);

if(isset($_POST['status'])){

verify_csrf();

$status=$_POST['status'];

$stmt=mysqli_prepare($conn,"
UPDATE orders
SET order_status=?
WHERE order_id=?
");

mysqli_stmt_bind_param($stmt,"si",$status,$order_id);
mysqli_stmt_execute($stmt);

header("Location: orders.php");
exit;

}

include "../../includes/header.php";
?>

<section>

<h2 class="section-title">Update Order</h2>

<form method="POST">

<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<select name="status">

<option>Processing</option>
<option>Shipped</option>
<option>Delivered</option>

</select>

<button class="btn">Update</button>

</form>

</section>

<?php include "../../includes/footer.php"; ?>