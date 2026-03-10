<?php
include "../includes/config.php";
include "../includes/header.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$contact = trim($_POST['contact']);

$q = mysqli_query($conn,"
SELECT email,phone_number
FROM users
WHERE email='$contact' OR phone_number='$contact'
");

if(mysqli_num_rows($q)>0){

echo "<p style='color:green;text-align:center'>
Please contact the store admin to reset your password.
</p>";

}else{

echo "<p style='color:red;text-align:center'>
Account not found.
</p>";

}

}
?>

<div class="auth-box">

<h2>Forgot Password</h2>

<form method="post" class="auth-form">

<label>Email or Phone Number</label>
<input type="text" name="contact" required>

<button class="btn">Recover Account</button>

</form>

</div>

<?php include "../includes/footer.php"; ?>