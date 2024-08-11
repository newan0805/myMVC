<?php
require_once('./includes/db.php');
require_once('./models/User.php');

class UserController {
    private $userModel;

    public function __construct() {
        global $db;
        $this->userModel = new User($db);
        // Start session
        // session_start();
    }

    public function signup($type, $username, $email, $password) {
        // Check if username already exists
        $existingUser = $this->userModel->getUserByUsername($username);
        if ($existingUser) {
            return "Username already exists";
        }

        // Create new user
        $result = $this->userModel->createUser($type, $username, $email, $password);
        if ($result) {
            if($_SESSION['user_type'] === 'admin') {
                header('Location: ./views/admin/dashboard.php');
                return true;
            }
            header('Location: ./views/user/login.php');
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        // Fetch user by username
        $user = $this->userModel->getUserByUsername($username);

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_type'] = $user['type'];
            $_SESSION['username'] = $user['username'];
            
            // Redirect the user to the dashboard view after successful login
            // echo $user['type'];
            if ($user['type'] === 'admin') {
                header('Location: ./views/admin/dashboard.php');
            }
            else {
                header('Location: ./views/user/dashboard.php');
            }
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
        // Destroy session and unset session variables
        session_unset();
        session_destroy();
        
        // Redirect to login page after logout
        header('Location: ./index.php');
        exit();
    }
}
