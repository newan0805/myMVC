<?php require_once('includes/header.php'); ?>

        <div class="container d-flex justify-content-center">
    <div class='m-8 w-50 '>

        <h2 class="mt-5">Manage Your Account</h2>
        <form action="index.php?action=update_profile" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="current_username" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="user@example.com">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
        <a href="user_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
    </div>

<?php require_once('includes/footer.php'); ?>
