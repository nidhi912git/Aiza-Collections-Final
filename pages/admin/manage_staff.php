<?php
$page_id = "admin-page";

include "../../includes/config.php";
include "../../includes/security.php";

require_admin();

include "../../includes/header.php";

$q = mysqli_query($conn, "
SELECT user_id,name,email,role
FROM users
WHERE role!='customer'
ORDER BY role DESC,name
");
?>

<section>

    <div class="admin-header">

        <div></div>

        <h2 class="section-title">Manage Staff</h2>

        <div class="admin-actions">
            <a href="dashboard.php" class="btn">Dashboard</a>
        </div>

    </div>

    <a href="add_staff.php" class="btn">Add Staff</a>

    <table class="admin-table">

        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php while ($u = mysqli_fetch_assoc($q)): ?>

            <tr>

                <td><?= htmlspecialchars($u['name']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><?= ucfirst($u['role']) ?></td>

                <td>

                    <?php if ($u['role'] == 'staff'): ?>

                        <form method="POST" action="remove_staff.php" class="remove-form">

                            <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
                            <input type="hidden" name="user_id" value="<?= $u['user_id'] ?>">

                            <button class="btn small-btn danger-btn">Remove</button>

                        </form>

                    <?php elseif ($u['role'] == 'manager'): ?>

                        <span style="color:#999;">Manager</span>

                    <?php endif; ?>

                </td>

            </tr>

        <?php endwhile; ?>

    </table>

</section>

<!-- ✅ REMOVE MODAL -->
<div id="removeModal" class="modal-overlay">
    <div class="modal-box">

        <h3>Remove Staff</h3>

        <p>Are you sure you want to remove this staff?</p>

        <div class="modal-actions">

            <button class="btn modal-cancel" onclick="closeRemoveModal()">No</button>

            <button class="btn modal-confirm" onclick="confirmRemove()">Yes</button>

        </div>

    </div>
</div>

<script>
let removeForm = null;

document.querySelectorAll(".remove-form").forEach(form => {

    form.addEventListener("submit", function(e) {

        e.preventDefault();
        removeForm = this;

        document.getElementById("removeModal").style.display = "flex";

    });

});

function closeRemoveModal() {
    document.getElementById("removeModal").style.display = "none";
}

function confirmRemove() {
    if (removeForm) {
        removeForm.submit();
    }
}
</script>

<?php include "../../includes/footer.php"; ?>