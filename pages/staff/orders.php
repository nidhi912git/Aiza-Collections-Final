<?php
$page_id = "staff-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_staff();

include "../../includes/header.php";

$q = mysqli_query($conn, "
SELECT order_id,order_total,order_status,created_at
FROM orders
ORDER BY created_at DESC
");
?>

<section>

    <h2 class="section-title">Orders</h2>

    <div class="orders-table-container">

        <table class="admin-table">

            <tr>
                <th>Order</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Update</th>
            </tr>

            <?php while ($o = mysqli_fetch_assoc($q)): ?>
                <?php
                $order_id = $o['order_id'];

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

                    <td>#<?= $o['order_id'] ?></td>
                    <td><?= date("d M Y", strtotime($o['created_at'])) ?></td>
                    <td>
                        ₹<?= number_format($updated_total) ?>

                        <?php if ($updated_total != $o['order_total']): ?>
                            <br>
                            <span style="text-decoration:line-through;opacity:0.6;font-size:12px;">
                                ₹<?= number_format($o['order_total']) ?>
                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="status status-<?= strtolower($o['order_status']) ?>">
                            <?= htmlspecialchars($o['order_status']) ?>
                        </span>
                    </td>
                    <td>
                        <a class="btn small-btn"
                            href="update_order_status.php?id=<?= $o['order_id'] ?>">
                            Update
                        </a>
                    </td>

                </tr>

            <?php endwhile; ?>

        </table>

    </div>

</section>

<?php include "../../includes/footer.php"; ?>