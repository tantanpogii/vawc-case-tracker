<?php
// This file defines the DashboardController class
require_once 'config/database.php';
class DashboardController {

    public function index() {
        // Get the PDO connection
        $pdo = getDB(); // This assumes the getDB() function is defined in config/database.php

        // Fetch the case counts from the database
        $stmt = $pdo->query("SELECT COUNT(*) AS total_cases FROM cases");
        $total_cases = $stmt->fetch(PDO::FETCH_ASSOC)['total_cases'];

        $stmt = $pdo->query("SELECT COUNT(*) AS active_cases FROM cases WHERE status = 'active'");
        $active_cases = $stmt->fetch(PDO::FETCH_ASSOC)['active_cases'];

        $stmt = $pdo->query("SELECT COUNT(*) AS pending_cases FROM cases WHERE status = 'pending'");
        $pending_cases = $stmt->fetch(PDO::FETCH_ASSOC)['pending_cases'];

        $stmt = $pdo->query("SELECT COUNT(*) AS closed_cases FROM cases WHERE status = 'closed'");
        $closed_cases = $stmt->fetch(PDO::FETCH_ASSOC)['closed_cases'];

        // Fetch all cases and order by incident_date (not date_opened)
        $stmt = $pdo->query("SELECT * FROM cases ORDER BY incident_date DESC");
        $cases = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Include the dashboard view and pass the data
        include 'views/dashboard/index.php'; // This will include the HTML and PHP code for the dashboard view
    }
}
