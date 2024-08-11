<?php
// Start the session
session_start();

// Include necessary files
require_once(__DIR__ . '/includes/db.php');

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

// Define a function to check if the user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Define a function to check if the admin is logged in
function isAdminLoggedIn() {
    return isset($_SESSION['admin_id']);
}

// Route the request based on the action parameter
switch ($action) {
    case 'login':
        require_once('controllers/UserController.php');
        $userController = new UserController();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($action === 'login') {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $result = $userController->login($username, $password);
            } 
        } else {
            header('Location: ./views/login.php');
            exit();
        }
        break;

    case 'signup':
        // Start the session
        //session_start();
        
        // User login and signup do not require authentication
        require_once('controllers/UserController.php');
        $userController = new UserController();
        
         // echo 'Breakdown';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $type = $_POST['type'] ?? 'user';
             $username = $_POST['username'] ?? '';
             $email = $_POST['email'] ?? '';
             $password = $_POST['password'] ?? '';
            
            //  echo ($type);
             $result = $userController->signup($type, $username, $email, $password);

             if($result) {
                if($_SESSION['user_type'] === 'admin') {
                    header('Location: /views/admin/dashboard');
                }
                header('Location: index.php');
             }
             
         } else {
             // Redirect to signup page if accessed via GET or other methods
            // header('Location: index.php');
            exit();
        }
        break;
        
    case 'logout': 
        require_once('controllers/UserController.php');
        $userController = new UserController();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $userController->logout();

            // if($result) {
            //     // header('Location: index.php');
            //     echo 'test';
            //     exit();
            // }
        }

    case 'update_profile':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once('controllers/AdminController.php');
            $adminController = new AdminController();
            
            $id = $_POST['user_id'] ?? '';
            $type = $_POST['type'] ?? '';
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            
            $result = $adminController->updateProfile($id, $type, $username, $email);
    
            // Redirect or display result based on the result of the update
            if ($result) {
                header('Location: index.php?action=view_users');
                exit();
            } else {
                echo $result; // Display error message or handle it
            }
        }
        break;  

    case 'view_users':
        // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once('controllers/AdminController.php');
            $adminController = new AdminController();
            $users = $adminController->getUsers(); // Fetch users
            // echo $users;
            include('views/admin/view_users.php'); // Include the view
            break;
        // }

    case 'delete_user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once('controllers/AdminController.php');
            $adminController = new AdminController();
            $id = $_POST['delete_user_id'] ?? '';
            // echo $id;
            $result = $adminController->deleteUser($id);
            echo $result;
            // if ($result) {
            //     header('Location: index.php?action=view_users');
            //     exit();
            // } else {
            //     echo "Failed to delete user";
            // }
        }
        break;
        
        

    default:
        // Redirect to login page if the user is not logged in
        if (isUserLoggedIn()) {
            include('vviews/user/dashboard.php');
            // header('Location: http://localhost/myMVC/');

            exit();
        } elseif (isAdminLoggedIn() && $_SESSION['type'] === 'admin') {
            // header('Location: http://localhost/myMVC/views/admin/dashboard');
            include('views/admin/dashboard.php');
        }

        // Otherwise, load the homepage or the default page
        // include('views/home.php');
        // echo $_SESSION['user_id'];
        // header('Location: http://localhost/myMVC/');

        exit();
        break;
}
