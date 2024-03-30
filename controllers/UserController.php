<?php
require_once('../includes/db.php');
require_once('../models/User.php');

class UserController {
    private $userModel;

    public function __construct() {
        global $db;
        $this->userModel = new User($db);
    }

    public function signup($username, $email, $password) {
        // Check if username already exists
        $existingUser = $this->userModel->getUserByUsername($username);
        if ($existingUser) {
            return "Username already exists";
        }

        // Create new user
        $result = $this->userModel->createUser($username, $email, $password);
        if ($result) {
            // Optionally, you can redirect the user to the login page after successful signup
            // header('Location: login.php');
            // exit();
            header('Location: ../../myMVC/views/user/login.php');
            return "User created successfully";
        } else {
            return "Failed to create user";
        }
    }

    public function login($username, $password) {
        // Fetch user by username
        $user = $this->userModel->getUserByUsername($username);

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, perform login operation (e.g., set session)
            // Example: $_SESSION['user_id'] = $user['id'];
            
            // Redirect the user to the dashboard view after successful login
            header('Location: ../../myMVC/views/user/dashboard.php');
            exit();
        } else {
            // Invalid username or password, redirect to login page with error message
            header('Location: login.php?error=1');
            exit();
        }
    }

    public function updateProfile($username, $email, $password) {
        // Fetch user by username
        $user = $this->userModel->getUserByUsername($username);
        
        // Check if the user exists
        if (!$user) {
            return "User not found";
        }
    
        // Update the user's profile
        $result = $this->userModel->updateUserProfile($username, $email, $password);
    
        if ($result) {
            return "Profile updated successfully";
        } else {
            return "Failed to update profile";
        }
    }    

    public function logout() {
        // Destroy session or perform logout operation
        // Example: session_destroy();
        
        // Redirect to login page or display logout confirmation
        // Example: header('Location: admin_login.php');
        // Example: echo "Logged out successfully";
        header('Location: ../../myMVC/views/user/login.php');
    }
}
?>
