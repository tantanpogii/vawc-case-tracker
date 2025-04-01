<?php
// Include config.php for global settings (e.g., database connection)
require_once 'config.php'; 

// Start the session if it's not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Default page is Login if no page is specified
$page = isset($_GET['page']) ? $_GET['page'] : 'login'; 

// Check if the user is logged in, except for the login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // If the user is not logged in and trying to access a protected page
    if ($page != 'login') {
        header('Location: index.php?page=login');
        exit();
    }
}

// Include the appropriate controller based on the requested page
switch ($page) {
    case 'login':
        require_once 'controllers/authController.php';
        $authController = new AuthController();
        $authController->login();
        break;

    case 'dashboard':
        require_once 'controllers/DashboardController.php';
        $dashboardController = new DashboardController();
        $dashboardController->index();
        break;

    case 'case':
        require_once 'controllers/CaseController.php';
        $caseController = new CaseController();
        $caseController->index();
        break;

    case 'report':
        require_once 'controllers/ReportController.php';
        $reportController = new ReportController();
        $reportController->index();
        break;

    default:
        // If no page matches, default to dashboard
        require_once 'controllers/DashboardController.php';
        $dashboardController = new DashboardController();
        $dashboardController->index();
        break;
}
?>
