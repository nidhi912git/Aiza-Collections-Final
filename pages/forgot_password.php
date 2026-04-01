<?php
include "../includes/config.php";
include "../includes/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');

    if (!$email) {
        $error = "Please enter your email";
    } else {

        $stmt = mysqli_prepare($conn, "SELECT user_id FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if ($user = mysqli_fetch_assoc($res)) {
            header("Location: reset_password.php?id=" . $user['user_id']);
            exit;
        } else {
            $error = "Email not found";
        }
    }
}
?>

<div class="auth-box">
    <h2>Forgot Password</h2>

    <form method="post" class="auth-form">

        <label>Email</label>
        <input type="email" name="email" required>

        <button class="btn">Continue</button>

    </form>

    <?php if (isset($error)): ?>
        <p class="auth-error"><?= $error ?></p>
    <?php endif; ?>
</div>

<?php include "../includes/footer.php"; ?>