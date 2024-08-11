<?php require_once('../../includes/header.php'); ?>

    <div class="container d-flex justify-content-center">
    <div class='m-8 w-50'>

        <h2 class="mt-5">Admin Signup</h2>
        <form action="index.php?action=signup" method="post" class="mt-3">
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" class="form-control" id="type" name="type" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Add user</button>
        </form>
    </div>
    </div>

<?php require_once('../../includes/footer.php'); ?> 