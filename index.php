<?php
// Include config.php for global settings (e.g., database connection)
require_once 'config.php'; 

// Default page is Dashboard if no page is specified
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Include the appropriate controller based on the requested page
switch ($page) {
    case 'login':
        require_once 'controllers/AuthController.php';
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
