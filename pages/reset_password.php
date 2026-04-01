<?php
include "../includes/config.php";
include "../includes/header.php";

$user_id = $_GET['id'] ?? null;

if (!$user_id) {
    echo "Invalid request";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newPass = $_POST['password'];

    $hash = password_hash($newPass, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "
        UPDATE users 
        SET password_hash=? 
        WHERE user_id=?
    ");

    mysqli_stmt_bind_param($stmt, "si", $hash, $user_id);
    mysqli_stmt_execute($stmt);

    $_SESSION['popup'] = "Password updated successfully!";
    header("Location: login.php");
    exit;
}
?>

<div class="auth-box">
    <h2>Reset Password</h2>

    <form method="post" class="auth-form">

        <label>New Password</label>
        <div class="password-field">

            <input type="password" name="password" id="resetPassword" required>

            <span class="toggle-password"
                onclick="togglePassword('resetPassword', this)">👁</span>

        </div>

        <button class="btn">Update Password</button>

    </form>
</div>

<?php include "../includes/footer.php"; ?>