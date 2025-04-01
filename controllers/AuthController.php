<?php
// AuthController.php

class AuthController {

    public function login() {
        // If the form is submitted (POST request)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input data
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            // Check against the database or hardcoded credentials for simplicity
            if ($username === 'admin' && $password === 'password') {
                // Start session and set session variables
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;

                 // Redirect to the dashboard after successful login
                 header('Location: index.php?page=dashboard');
                exit();
            } else {
                // If login fails, set the error message and display the login page again
                $error = 'Invalid username or password!';
                // Include the login view and pass the error message to it
                include 'views\auth\login.php'; // Send the error to the view
            }
        } else {
            // Display the login form if it's a GET request
            include 'views\auth\login.php'; // Show login form
        }
    }
}
?>
