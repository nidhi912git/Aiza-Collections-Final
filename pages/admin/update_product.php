<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

/* =========================
   GET FORM DATA
========================= */

$code     = trim($_POST['code'] ?? '');
$category = intval($_POST['category'] ?? 0);
$name     = trim($_POST['name'] ?? '');
$price    = floatval($_POST['price'] ?? 0);
$desc     = trim($_POST['desc'] ?? '');
$featured = intval($_POST['featured'] ?? 0);
$active   = intval($_POST['active'] ?? 1);

/* =========================
   SIZE STOCK (STRICT)
========================= */

$stocks = [
    "S"   => intval($_POST['stock_S'] ?? 0),
    "M"   => intval($_POST['stock_M'] ?? 0),
    "L"   => intval($_POST['stock_L'] ?? 0),
    "XL"  => intval($_POST['stock_XL'] ?? 0),
    "XXL" => intval($_POST['stock_XXL'] ?? 0)
];

/* =========================
   VALIDATION
========================= */

if (!$code || !$name || $price <= 0 || $category <= 0) {
    $_SESSION['popup'] = "Invalid product data.";
    header("Location: products.php");
    exit;
}

/* =========================
   START TRANSACTION
========================= */

mysqli_begin_transaction($conn);

try {

    /* =========================
       UPDATE PRODUCT
    ========================= */

    $stmt = mysqli_prepare($conn, "
        UPDATE products
        SET
            category_num = ?,
            product_name = ?,
            description = ?,
            price = ?,
            is_featured = ?,
            is_active = ?
        WHERE TRIM(product_code) = ?
    ");

    mysqli_stmt_bind_param(
        $stmt,
        "issdiis",
        $category,
        $name,
        $desc,
        $price,
        $featured,
        $active,
        $code
    );

    mysqli_stmt_execute($stmt);

    /* =========================
       STOCK UPDATE (FORCED MATCH)
    ========================= */

    foreach ($stocks as $size => $qty) {

        $size = trim(strtoupper($size)); // normalize

        $stmt2 = mysqli_prepare($conn, "
            UPDATE product_stock
            SET stock_qty = ?
            WHERE TRIM(product_code) = ? AND TRIM(size) = ?
        ");

        mysqli_stmt_bind_param($stmt2, "iss", $qty, $code, $size);
        mysqli_stmt_execute($stmt2);

        /* 🔥 FORCE CHECK */

        if (mysqli_stmt_affected_rows($stmt2) === 0) {

            // Check if row exists but mismatch
            $check = mysqli_prepare($conn, "
                SELECT * FROM product_stock
                WHERE TRIM(product_code) = ? AND TRIM(size) = ?
            ");

            mysqli_stmt_bind_param($check, "ss", $code, $size);
            mysqli_stmt_execute($check);

            $result = mysqli_stmt_get_result($check);

            if (mysqli_num_rows($result) == 0) {

                // Insert ONLY if truly not exists
                $stmt3 = mysqli_prepare($conn, "
                    INSERT INTO product_stock (product_code, size, stock_qty)
                    VALUES (?, ?, ?)
                ");

                mysqli_stmt_bind_param($stmt3, "ssi", $code, $size, $qty);
                mysqli_stmt_execute($stmt3);
            }
        }
    }

    mysqli_commit($conn);

    $_SESSION['popup'] = "Product updated successfully.";

} catch (Exception $e) {

    mysqli_rollback($conn);
    $_SESSION['popup'] = "Error: " . $e->getMessage();
}

header("Location: products.php");
exit;