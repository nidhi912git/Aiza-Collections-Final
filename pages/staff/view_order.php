<?php
$page_id = "staff-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_staff();

$order_id = intval($_GET['id'] ?? 0);

/* ===============================
   CHECK ORDER STATUS FIRST
================================ */

$checkQ = mysqli_query($conn, "
SELECT order_status FROM orders WHERE order_id='$order_id'
");

$checkRow = mysqli_fetch_assoc($checkQ);
$isCancelled = strtolower($checkRow['order_status'] ?? '') == 'cancelled';

/* ===============================
   UPDATE ORDER STATUS
================================ */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    verify_csrf();

    // ❌ BLOCK IF CANCELLED
    if ($isCancelled) {
        die("This order is cancelled and cannot be updated.");
    }

    $status = $_POST['status'] ?? '';

    $allowed = ['Placed', 'Processing', 'Shipped', 'Delivered', 'Cancelled'];

    if (in_array($status, $allowed)) {

        $stmt = mysqli_prepare($conn, "
      UPDATE orders
      SET order_status=?
      WHERE order_id=?
      ");

        mysqli_stmt_bind_param($stmt, "si", $status, $order_id);
        mysqli_stmt_execute($stmt);
    }

    header("Location: orders.php");
    exit;
}

include "../../includes/header.php";

/* ===============================
   GET ORDER DETAILS
================================ */

$stmt = mysqli_prepare($conn, "
SELECT
o.order_id,
o.order_total,
o.order_status,
o.created_at,
u.name
FROM orders o
LEFT JOIN users u
ON o.user_id = u.user_id
WHERE o.order_id = ?
");

mysqli_stmt_bind_param($stmt, "i", $order_id);
mysqli_stmt_execute($stmt);

$order_result = mysqli_stmt_get_result($stmt);
$order = mysqli_fetch_assoc($order_result);

if (!$order) {
    echo "<p style='text-align:center;'>Order not found</p>";
    include "../../includes/footer.php";
    exit;
}

/* ===============================
   GET ORDER ITEMS + SIZE
================================ */

$stmt2 = mysqli_prepare($conn, "
SELECT
oi.product_code,
oi.size,
oi.quantity,
oi.price,
oi.item_status,
oi.cancelled_at,
p.product_name
FROM order_items oi
LEFT JOIN products p
ON oi.product_code = p.product_code
WHERE oi.order_id = ?
");

mysqli_stmt_bind_param($stmt2, "i", $order_id);
mysqli_stmt_execute($stmt2);

$items_query = mysqli_stmt_get_result($stmt2);
?>

<section class="order-view-container">

    <h2 class="section-title">Order #<?= $order_id ?></h2>

    <div class="order-info">

        <p>
            <strong>Customer:</strong>
            <?= htmlspecialchars($order['name'] ?? '') ?>
        </p>

        <p>
            <strong>Date:</strong>
            <?= date("d M Y", strtotime($order['created_at'])) ?>
        </p>

        <p>
            <strong>Status:</strong>
            <span><?= htmlspecialchars($order['order_status']) ?></span>
        </p>

    </div>

    <h3>Items Ordered</h3>

    <table class="order-items-table">

        <tr>
            <th>Product</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Status</th>
        </tr>

        <?php $total = 0; ?>
        <?php while ($item = mysqli_fetch_assoc($items_query)): ?>

            <tr>

                <td><?= htmlspecialchars($item['product_name'] ?? '') ?></td>

                <td>
                    <?= !empty($item['size'])
                        ? htmlspecialchars($item['size'])
                        : '-' ?>
                </td>

                <td><?= intval($item['quantity']) ?></td>

                <td>₹<?= number_format($item['price']) ?></td>

                <td>₹<?= number_format($item['price'] * $item['quantity']) ?></td>

                <?php
                if (($item['item_status'] ?? '') != 'Cancelled') {
                    $total += $item['price'] * $item['quantity'];
                }
                ?>

                <td style="<?= ($item['item_status'] ?? '') == 'Cancelled' ? 'color:red;font-weight:bold;' : '' ?>">

                    <?= $item['item_status'] ?? 'Placed' ?>

                    <?php if (($item['item_status'] ?? '') == 'Cancelled' && !empty($item['cancelled_at'])): ?>
                        <br>
                        <small style="color:red;">
                            (Cancelled on <?= date("d M Y", strtotime($item['cancelled_at'])) ?>)
                        </small>
                    <?php endif; ?>

                </td>

            </tr>

        <?php endwhile; ?>

    </table>

    <p class="order-total">
        Total: ₹<?= number_format($total) ?>
    </p>

    <hr>

    <div class="order-status-update">

        <h3>Update Order Status</h3>

        <form method="POST">

            <input type="hidden" name="csrf" value="<?= csrf_token() ?>">

            <div class="custom-dropdown">

                <div class="dropdown-selected">
                    Select Status
                </div>

                <div class="dropdown-menu" <?= $isCancelled ? 'style="pointer-events:none; opacity:0.5;"' : '' ?>>

                    <div class="dropdown-item">Placed</div>
                    <div class="dropdown-item">Processing</div>
                    <div class="dropdown-item">Shipped</div>
                    <div class="dropdown-item">Delivered</div>
                    <div class="dropdown-item">Cancelled</div>

                </div>

                <input type="hidden" name="status" id="statusInput">

            </div>

            <button
                type="submit"
                name="update_status"
                class="btn update-status-btn"
                <?= $isCancelled ? 'disabled style="opacity:0.5; cursor:not-allowed;"' : '' ?>>

                Update Status

            </button>

        </form>

    </div>

</section>

<?php include "../../includes/footer.php"; ?>