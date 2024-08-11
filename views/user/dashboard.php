<?php require_once('includes/header.php'); ?>

<body>
    <div class="container d-flex justify-content-center">
    <div class='m-8 w-50 '>
        <h2 class="mt-5">Welcome User!</h2>
        <p class="mt-3">This is your dashboard. You can manage your account here.</p>
        <a href="manage_account.php" class="btn btn-primary">Manage Account</a>
        <br><br>
        <form action="index.php?action=logout" method="post" style="display: inline;">
            <button type="submit" class="btn btn-secondary">Logout</button>
        </form>
    </div>
    </div>

<?php require_once('includes/footer.php'); ?>
