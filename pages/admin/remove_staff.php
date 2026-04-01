<?php

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

/* GET USER ID */

$id = intval($_POST['user_id'] ?? 0);

if (!$id) {
    header("Location: manage_staff.php");
    exit;
}

/* ===============================
   CHECK ROLE FIRST (IMPORTANT)
================================ */

$check = mysqli_query($conn, "
SELECT role FROM users WHERE user_id='$id'
");

$row = mysqli_fetch_assoc($check);

/* ❌ BLOCK IF ALREADY USER */
if (($row['role'] ?? '') == 'user') {
    $_SESSION['popup'] = "Cannot remove. User is not a staff member.";
    header("Location: manage_staff.php");
    exit;
}

/* ===============================
   REMOVE STAFF ROLE
================================ */

$stmt = mysqli_prepare($conn, "
UPDATE users
SET role='user'
WHERE user_id=? AND role='staff'
");

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

/* POPUP MESSAGE */

$_SESSION['popup'] = "Staff member removed. Account is now a normal user.";

/* REDIRECT */

header("Location: manage_staff.php");
exit;