<?php
$page_id = "staff-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_staff();

include "../../includes/header.php";

/* ===============================
   PENDING ORDERS
================================ */

$stmt = mysqli_prepare($conn, "
SELECT COUNT(*) AS total
FROM orders
WHERE order_status IN ('Placed','Processing','Pending')
");

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

$pending = $data['total'] ?? 0;

?>

<section>

   <h2 class="section-title">Staff Dashboard</h2>

   <div class="dashboard-stats">

      <div class="dash-item">

         <span>Pending Orders</span>
         <h3><?= $pending ?></h3>

      </div>

   </div>

   <div class="dashboard-actions">

      <a href="orders.php" class="btn">View Orders</a>

   </div>

</section>

<?php include "../../includes/footer.php"; ?>