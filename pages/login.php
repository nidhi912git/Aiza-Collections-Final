<?php
$page_id="login-page";

include "../includes/config.php";
include_once "../includes/security.php";
include "../includes/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

verify_csrf();

$email = trim($_POST['email']);
$pass  = $_POST['password'];

$stmt = mysqli_prepare($conn,
"SELECT user_id,name,password_hash,role FROM users WHERE email=?"
);

mysqli_stmt_bind_param($stmt,"s",$email);
mysqli_stmt_execute($stmt);

$res = mysqli_stmt_get_result($stmt);

if ($u = mysqli_fetch_assoc($res)) {

if (password_verify($pass,$u['password_hash'])) {

session_regenerate_id(true);
$_SESSION['user'] = $u;

/* REMEMBER ME */

if(isset($_POST['remember'])){

$token = bin2hex(random_bytes(32));

setcookie(
"remember_token",
$token,
time() + (86400 * 30),
"/"
);

$stmt = mysqli_prepare($conn,
"UPDATE users SET remember_token=? WHERE user_id=?"
);

mysqli_stmt_bind_param($stmt,"si",$token,$u['user_id']);
mysqli_stmt_execute($stmt);

}

/* ROLE REDIRECT */

if($u['role'] === 'manager'){
header("Location: /aiza-collections-final/pages/admin/products.php");
}else{
header("Location: /aiza-collections-final/pages/home.php");
}

exit;
}
}

$error="Invalid email or password";
}
?>



<div class="auth-box">

<h2>Login</h2>
<p class="auth-sub">Access your Aiza Collections account</p>

<form method="post" class="auth-form">

<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<label>Email address</label>
<input type="email" name="email" required>

<label>Password</label>
<div class="password-field">
<input type="password" name="password" id="loginPassword" required>
<span class="toggle-password" onclick="togglePassword('loginPassword', this)">👁</span>
</div>

<div class="auth-extra">

<label>
<input type="checkbox" name="remember">
Remember me
</label>

<a href="forgot_password.php">Forgot password?</a>

</div>

<button class="btn">Login</button>

</form>

<?php if(isset($error)): ?>
<p class="auth-error"><?= $error ?></p>
<?php endif; ?>

<p class="auth-switch">
Don't have an account?
<a href="register.php">Create one</a>
</p>

</div>


<?php include "../includes/footer.php"; ?>