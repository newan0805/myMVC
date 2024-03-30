<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Welcome Admin!</h2>
        <p class="mt-3">This is your dashboard. You can manage users here.</p>
        <a href="manage_users.php" class="btn btn-primary">Manage Users</a>
        <br><br>
        <a href="../controllers/AdminController.php?action=logout" class="btn btn-secondary">Logout</a>
    </div>
</body>
</html>
