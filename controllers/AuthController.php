<?php
// Include the database connection
require_once 'config/database.php';

class AuthController {

    public function login() {
        // If the form is submitted (POST request)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input data
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            
            // Get the PDO connection from the database function
            $pdo = getDB(); // This will get the PDO object

            // Prepare the SQL query to fetch the user
            $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Check if user exists and verify password
            if ($user && password_verify($password, $user['password'])) {
                // Start session and set session variables
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $user['role']; // Assuming the user's role is stored in the 'role' column

                // Redirect to the dashboard after successful login
                header('Location: index.php?page=dashboard');
                exit();
            } else {
                // If login fails, set the error message and display the login page again
                $error = 'Invalid username or password!';
                include 'views/auth/login.php'; // Send the error to the view
            }
        } else {
            // Display the login form if it's a GET request
            include 'views/auth/login.php'; // Show login form
        }
    }
}
?>
