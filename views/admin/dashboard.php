<?php require_once('../../includes/header.php'); ?>

    <div class="container d-flex justify-content-center">
        <div class='m-8'>
            <h2 class="mt-5">Welcome Admin!</h2>
            <p class="mt-3">This is your dashboard. You can manage users here.</p>
            <a href="signup.php" class="btn btn-secondary">Add user Users</a>
            
            <form action="../../index.php?action=view_users" method="post" style="display: inline;">
                <button type="submit" class="btn btn-secondary">All Users</button>
            </form>
            
            <br><br>
            <form action="../../index.php?action=logout" method="post" style="display: inline;">
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
        </div>
    </div>

<?php require_once('../../includes/footer.php'); ?>