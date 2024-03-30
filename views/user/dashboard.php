<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Welcome User!</h2>
        <p class="mt-3">This is your dashboard. You can manage your account here.</p>
        <a href="manage_account.php" class="btn btn-primary">Manage Account</a>
        <br><br>
        <a href="../controllers/UserController.php?action=logout" class="btn btn-secondary">Logout</a>
    </div>
</body>
</html>
    