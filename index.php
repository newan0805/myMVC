<?php
// Include necessary files
require_once('includes/db.php');

// Define the routes and their corresponding controllers and actions
$routes = [
    'login' => ['controller' => 'UserController', 'action' => 'login'],
    'signup' => ['controller' => 'UserController', 'action' => 'signup'],
    'admin_login' => ['controller' => 'AdminController', 'action' => 'login'],
    'admin_logout' => ['controller' => 'AdminController', 'action' => 'logout'],
    // Add more routes as needed
];

// Get the action parameter from the URL (if exists)
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Route the request based on the action parameter
switch ($action) {
    case 'login':
    case 'signup':
        // If action is related to user, route to UserController
        require_once('controllers/UserController.php');
        $userController = new UserController();

        // Handle the requested action
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($action === 'login') {
                // Process login request
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $result = $userController->login($username, $password);
                // Check the login result
                if ($result === "Login successful") {
                    // Redirect to user dashboard
                    header('Location: user/dashboard.php');
                    exit();
                } else {
                    // Redirect to login page with error message
                    header('Location: login.php?error=1');
                    exit();
                }
            } elseif ($action === 'signup') {
                // Process signup request
                $username = $_POST['username'] ?? '';
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                $result = $userController->signup($username, $email, $password);
                // Check the signup result
                if ($result === "User created successfully") {
                    // Redirect to login page with success message
                    header('Location: login.php?signup=success');
                    exit();
                } else {
                    // Redirect to signup page with error message
                    header('Location: signup.php?error=1');
                    exit();
                }
            }
        } else {
            // Redirect to login page with error message
            header('Location: login.php?error=1');
            exit();
        }
        break;

    case 'admin_login':
        // If action is related to admin login, route to AdminController
        require_once('controllers/AdminController.php');
        $adminController = new AdminController();

        // Handle the admin login request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $result = $adminController->login($username, $password);
            // Check the login result
            if ($result === "Login successful") {
                // Redirect to admin dashboard
                header('Location: admin/dashboard.php');
                exit();
            } else {
                // Redirect to admin login page with error message
                header('Location: admin_login.php?error=1');
                exit();
            }
        } else {
            // Redirect to admin login page with error message
            header('Location: admin_login.php?error=1');
            exit();
        }
        break;

    case 'admin_logout':
        // If action is related to admin logout, route to AdminController
        require_once('controllers/AdminController.php');
        $adminController = new AdminController();

        // Handle the admin logout request
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $result = $adminController->logout();
            // Check the logout result
            if ($result === "Logged out successfully") {
                // Redirect to admin login page with success message
                header('Location: admin_login.php?logout=1');
                exit();
            } else {
                // Redirect to admin login page with error message
                header('Location: admin_login.php?error=1');
                exit();
            }
        }
        break;

    default:
        // Handle default action (e.g., display homepage or load login page)
        // Check if the default action is 'login'
        if ($action === 'login') {
            // Load the login page
            include('views/user/login.php');
            exit();
        } else {
            // Otherwise, load the homepage
            include('views/home.php');
            exit();
        }
        break;
}
?>
