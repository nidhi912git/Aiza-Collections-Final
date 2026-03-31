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

        <div></div> <!-- left empty -->

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

                    <?php if ($u['role'] != 'manager'): ?>

                        <form method="POST" action="remove_staff.php"
                            onsubmit="return confirm('Remove staff access?');">

                            <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
                            <input type="hidden" name="user_id" value="<?= $u['user_id'] ?>">

                            <button class="btn small-btn danger-btn">Remove</button>

                        </form>

                    <?php else: ?>

                        <span style="color:#999;">Manager</span>

                    <?php endif; ?>

                </td>

            </tr>

        <?php endwhile; ?>

    </table>

</section>

<?php include "../../includes/footer.php"; ?>