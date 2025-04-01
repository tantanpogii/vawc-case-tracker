<?php
// logout.php

// Start the session
session_start();

// Unset all session variables
session_unset(); 

// Destroy the session
session_destroy(); 

// Clear the session array to ensure it's fully removed
$_SESSION = array(); 

// Redirect to login page after logout
header('Location: index.php?page=login');
exit();
?>
