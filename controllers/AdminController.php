<?php
require_once('../includes/db.php');
require_once('../models/Admin.php');

class AdminController {
    private $adminModel;

    public function __construct() {
        global $db;
        $this->adminModel = new Admin($db);
    }

    public function login($username, $password) {
        // Fetch admin by username
        $admin = $this->adminModel->getAdminByUsername($username);

        // Verify password
        if ($admin && password_verify($password, $admin['password'])) {
            // Password is correct, set session or return success message
            
            // Example: Setting session
            // $_SESSION['admin_id'] = $admin['id'];

            // Include admin dashboard view or redirect to dashboard
            include('../views/admin/dashboard.php');
        } else {
            // Invalid username or password
            // You can redirect to login page or display an error message
            // Example: header('Location: admin_login.php');
            // Example: echo "Invalid username or password";
            header('Location: admin_login.php');
        }
    }

    public function logout() {
        // Destroy session or perform logout operation
        // Example: session_destroy();
        
        // Redirect to login page or display logout confirmation
        // Example: header('Location: admin_login.php');
        // Example: echo "Logged out successfully";
        header('Location: admin_login.php');
    }
}
?>
