<?php
$page_id="register-page";

include "../includes/config.php";
include_once "../includes/security.php";
include "../includes/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  verify_csrf();

 $name  = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$pass  = $_POST['password'];

  if (!$name || !$email || !$phone || !$pass) {
$error = "All fields are required";
}

elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
$error = "Name can contain only letters and spaces";
}

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$error = "Invalid email format";
}

elseif (!preg_match("/^[A-Za-z]/", $email)) {
$error = "Email must start with a letter";
}
elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
$error = "Phone number must be exactly 10 digits";
}

elseif (strlen($pass) < 6) {
$error = "Password must be at least 6 characters long";
}

elseif (!preg_match("/[A-Z]/", $pass) || !preg_match("/[0-9]/", $pass)) {
$error = "Password must contain at least one uppercase letter and one number";
}

elseif ($_POST['password'] !== $_POST['confirm_password']) {
$error = "Passwords do not match";
}

else {

  $hash = password_hash($pass, PASSWORD_DEFAULT);

 $stmt = mysqli_prepare($conn,
"INSERT INTO users (name,email,phone_number,password_hash) VALUES (?,?,?,?)"
);
mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$phone,$hash);

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
<input 
type="text"
name="name"
required
pattern="[A-Za-z ]+"
title="Name should contain only letters and spaces">

<label>Email address</label>
<input 
type="email"
name="email"
required
pattern="[A-Za-z][A-Za-z0-9._%+-]*@[A-Za-z0-9.-]+\.[A-Za-z]{2,}"
title="Email must start with a letter and be a valid email address">

<label>Phone Number</label>

<input
type="tel"
name="phone"
required
pattern="[0-9]{10}"
maxlength="10"
title="Enter a valid 10 digit phone number"
placeholder="9876543210">

<label>Password</label>
<p class="password-hint">
Minimum 6 characters. Use a mix of letters and numbers for stronger security.
</p>
<div class="password-field">
<input 
type="password"
name="password"
id="regPassword"
required
pattern="(?=.*[A-Z])(?=.*[0-9]).{6,}"
title="Password must contain at least 6 characters, one uppercase letter and one number">
<span class="toggle-password" onclick="togglePassword('regPassword', this)">👁</span>
</div>

<div id="passwordStrength" class="password-strength"></div>

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