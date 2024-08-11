<?php
require_once('./includes/db.php');
require_once('./models/Admin.php');

class AdminController {
    private $adminModel;

    public function __construct() {
        global $db;
        $this->adminModel = new Admin($db);
        // Start session
        // session_start();
    }

    public function login($username, $password) {
        // Fetch admin by username
        $admin = $this->adminModel->getAdminByUsername($username);

        // Verify password
        if ($admin && password_verify($password, $admin['password'])) {
            // Password is correct, set session variables
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            // Redirect to admin dashboard
            header('Location: ../views/admin/dashboard.php');
            exit();
        } else {
            // Invalid username or password, redirect to login page
            header('Location: http://localhost/myMVC/admin_login.php?error=1');
            exit();
        }
    }

    public function getUsers() {
        // Fetch all users from the model
        return $this->adminModel->getAllUsers();
    }

    public function updateProfile($id, $type, $username, $email) {
        // Call the model method to update the user profile
        $result = $this->adminModel->updateUserProfile($id, $type, $username, $email);
    
        if ($result > 0) {
            return 1;
        } else {
            return 'Updating profile failed!';
        }
    }

    public function logout() {
        // Destroy session and unset session variables
        session_unset();
        session_destroy();
        
        // Redirect to admin login page
        header('Location: index.php');
        exit();
    }

    public function deleteUser($id) {
        $result = $this->adminModel->deleteUser($id);
        if ($result > 0) {
            return 1;
        } else {
            return 'Updating profile failed!';
        }
    }
    
}
