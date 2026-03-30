<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

/* GET ALL ORDERS */

$q = mysqli_query($conn, "
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

        <?php if (mysqli_num_rows($q) == 0): ?>

            <p style="text-align:center;">No orders found.</p>

        <?php else: ?>

            <table class="admin-table">

                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($q)): ?>
                    <?php
                    $order_id = $row['order_id'];

                    /* CALCULATE UPDATED TOTAL */
                    $totalQ = mysqli_query($conn, "
SELECT 
SUM(
  CASE 
    WHEN item_status != 'Cancelled' 
    THEN price * quantity 
    ELSE 0 
  END
) AS updated_total
FROM order_items
WHERE order_id='$order_id'
");

                    $totalRow = mysqli_fetch_assoc($totalQ);
                    $updated_total = $totalRow['updated_total'] ?? 0;
                    ?>

                    <tr>

                        <td>#<?= htmlspecialchars($row['order_id']) ?></td>

                        <td><?= htmlspecialchars($row['name'] ?? 'Guest') ?></td>

                        <td><?= date("d M Y", strtotime($row['created_at'])) ?></td>

                        <td>
                            ₹<?= number_format($updated_total) ?>

                            <?php if ($updated_total != $row['order_total']): ?>
                                <br>
                                <span style="text-decoration:line-through;opacity:0.6;font-size:12px;">
                                    ₹<?= number_format($row['order_total']) ?>
                                </span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <span class="status status-<?= strtolower($row['order_status']) ?>">
                                <?= htmlspecialchars($row['order_status']) ?>
                            </span>
                        </td>

                        <td>
                            <a class="btn small-btn"
                                href="view_order.php?id=<?= htmlspecialchars($row['order_id']) ?>">
                                View
                            </a>
                        </td>

                    </tr>

                <?php endwhile; ?>

            </table>

        <?php endif; ?>

    </div>

</section>

<?php include "../../includes/footer.php"; ?>