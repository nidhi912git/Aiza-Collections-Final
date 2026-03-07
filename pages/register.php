<?php
$page_id="register-page";

include "../includes/config.php";
include_once "../includes/security.php";
include "../includes/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  verify_csrf();

  $name  = trim($_POST['name']);
  $email = trim($_POST['email']);
  $pass  = $_POST['password'];

  if (!$name || !$email || strlen($pass) < 6) {

  $error = "Password must be at least 6 characters";

}
elseif ($_POST['password'] !== $_POST['confirm_password']) {

  $error = "Passwords do not match";

}
else {

  $hash = password_hash($pass, PASSWORD_DEFAULT);

  $stmt = mysqli_prepare($conn,
    "INSERT INTO users (name,email,password_hash) VALUES (?,?,?)"
  );

  mysqli_stmt_bind_param($stmt,"sss",$name,$email,$hash);

  if (!mysqli_stmt_execute($stmt)) {
    $error = "Email already exists";
  }
  else {
    header("Location: login.php");
    exit;
  }

}
}
?>



<div class="auth-box">

<h2>Create Account</h2>

<p class="auth-sub">
Register to save favourites and manage your cart
</p>

<form method="post" class="auth-form">

<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<label>Full Name</label>
<input type="text" name="name" required>

<label>Email address</label>
<input type="email" name="email" required>

<label>Password</label>
<p class="password-hint">
Minimum 6 characters. Use a mix of letters and numbers for stronger security.
</p>
<div class="password-field">
<input type="password" name="password" id="regPassword" required>
<span class="toggle-password" onclick="togglePassword('regPassword', this)">👁</span>
</div>

<label>Confirm Password</label>
<div class="password-field">
<input type="password" name="confirm_password" id="regConfirmPassword" required>
<span class="toggle-password" onclick="togglePassword('regConfirmPassword', this)">👁</span>
</div>

<button class="btn">Create Account</button>

</form>

<?php if(isset($error)): ?>
<p class="auth-error"><?= $error ?></p>
<?php endif; ?>

<p class="auth-switch">
Already registered?
<a href="login.php">Login</a>
</p>

</div>

<?php include "../includes/footer.php"; ?>