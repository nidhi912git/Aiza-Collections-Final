<?php

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

/* GET FORM DATA SAFELY */

$code     = trim($_POST['code'] ?? '');
$category = intval($_POST['category'] ?? 0);
$name     = trim($_POST['name'] ?? '');
$price    = floatval($_POST['price'] ?? 0);
$color    = trim($_POST['color'] ?? '');
$desc     = trim($_POST['desc'] ?? '');
$featured = intval($_POST['featured'] ?? 0);
$active   = intval($_POST['active'] ?? 1);
$stock    = intval($_POST['stock'] ?? 0);

/* BASIC VALIDATION */

if (!$code || !$name || $price < 0) {

    $_SESSION['popup'] = "Invalid product data.";
    header("Location: add_product.php");
    exit;
}

/* CHECK IF PRODUCT CODE EXISTS */

$stmt = mysqli_prepare($conn, "
    SELECT product_code
    FROM products
    WHERE product_code=?
");

mysqli_stmt_bind_param($stmt, "s", $code);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    $_SESSION['popup'] = "Product code already exists.";
    header("Location: add_product.php");
    exit;
}

/* ================= INSERT PRODUCT ================= */

$stmt = mysqli_prepare($conn, "
    INSERT INTO products
    (product_code,category_num,product_name,description,price,is_featured,is_active)
    VALUES (?,?,?,?,?,?,?)
");

mysqli_stmt_bind_param(
    $stmt,
    "sissdii",
    $code,
    $category,
    $name,
    $desc,
    $price,
    $featured,
    $active
);

mysqli_stmt_execute($stmt);

/* ================= CREATE SIZE STOCK (FIXED POSITION) ================= */


$sizes = ['S', 'M', 'L', 'XL', 'XXL'];

foreach ($sizes as $size_item) {


    $result = mysqli_query($conn, "
        INSERT INTO product_stock (product_code, size, stock_qty)
        VALUES ('$code', '$size', 15)
    ");

    if (!$result) {
        die("Stock Insert Error: " . mysqli_error($conn));
    }
}
exit;

/* ================= IMAGE UPLOAD ================= */

$allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
$max_size = 150 * 1024; // 150KB


if (!empty($_FILES['images']['name'][0])) {
    $total = count($_FILES['images']['name']);

    if ($total < 1 || $total > 5) {
        $_SESSION['popup'] = "Upload between 1 to 5 images.";
        header("Location: add_product.php");
        exit;
    }

    for ($i = 0; $i < $total; $i++) {

        $tmp  = $_FILES['images']['tmp_name'][$i];
        $name_img = $_FILES['images']['name'][$i];
        $type = $_FILES['images']['type'][$i];
        $size_file = $_FILES['images']['size'][$i];

        if (!in_array($type, $allowed_types)) {
            $_SESSION['popup'] = "Only JPG, JPEG, PNG allowed.";
            header("Location: add_product.php");
            exit;
        }

        if ($size_file > $max_size) {
            $_SESSION['popup'] = "Each image must be less than 150KB.";
            header("Location: add_product.php");
            exit;
        }

        $new_name = time() . "_" . $i . "_" . basename($name_img);

        $upload_path = "../../assets/uploads/" . $new_name;

        if (!move_uploaded_file($tmp, $upload_path)) {
             die("Image upload failed");
        }
        mysqli_query($conn, "
            INSERT INTO product_images (product_code, image_path)
            VALUES ('$code', '$new_name')
        ");
    }
}

/* ================= SUCCESS ================= */

$_SESSION['popup'] = "Product added successfully.";
header("Location: products.php");
exit;