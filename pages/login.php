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

      $_SESSION['user']=$u;

      header("Location: home.php");
      exit;

    }

  }

  $error="Invalid email or password";
}
?>

<section>

<div class="auth-box">

<h2>Login</h2>
<p class="auth-sub">Access your Aiza Collections account</p>

<form method="post" class="auth-form">

<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<label>Email address</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="password" name="password" required>

<div class="auth-extra">

<label>
<input type="checkbox" name="remember">
Remember me
</label>

<a href="#">Forgot password?</a>

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

</section>

<?php include "../includes/footer.php"; ?>