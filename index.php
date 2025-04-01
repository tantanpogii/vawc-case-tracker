<?php
// Include config.php for global settings (e.g., database connection)
require_once 'config.php'; 

// Check if the session is already started, if not, start it
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in, except for the login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // If not logged in, redirect to the login page
    if ($_GET['page'] != 'login') {
        header('Location: index.php?page=login');
        exit();
    }
}

// Default page is Login if no page is specified
$page = isset($_GET['page']) ? $_GET['page'] : 'login'; // Default to 'login' page

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
