<?php
$page_id="admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";
?>

<section>

<h2 class="section-title">Add Staff</h2>

<form method="POST" action="add_staff_save.php" class="admin-form">

<input type="hidden" name="csrf" value="<?= csrf_token() ?>">

<label>User Email</label>
<input type="email" name="email" required>

<label>Role</label>

<select name="role">

<option value="staff">Staff</option>
<option value="manager">Manager</option>

</select>

<button class="btn">Assign Role</button>

</form>

</section>

<?php include "../../includes/footer.php"; ?>