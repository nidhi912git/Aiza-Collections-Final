<?php

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();
verify_csrf();

$email=$_POST['email'] ?? '';
$role=$_POST['role'] ?? 'staff';

$stmt=mysqli_prepare($conn,"
UPDATE users
SET role=?
WHERE email=?
");

mysqli_stmt_bind_param($stmt,"ss",$role,$email);
mysqli_stmt_execute($stmt);

$_SESSION['popup']="Role assigned successfully.";

header("Location: manage_staff.php");
exit;