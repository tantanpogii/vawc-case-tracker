<?php
// Database configuration
define('DB_HOST', 'localhost');          // Your database host, e.g., 'localhost' or IP address
define('DB_NAME', 'vawc_db');            // Your database name
define('DB_USER', 'root');               // Your database username
define('DB_PASS', '');                   // Your database password (leave empty for local development)

// Site settings
define('SITE_URL', 'http://localhost/vawc-case-tracker');  // The base URL of your app (use the appropriate URL for production)
define('SITE_NAME', 'VAWC Case Tracker');  // Name of your site

// Start session (if you want to use sessions for authentication, etc.)
session_start();

// Set default timezone (adjust as needed)
date_default_timezone_set('Asia/Manila');  // Adjust to your local timezone
