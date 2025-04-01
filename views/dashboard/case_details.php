<?php
// case_details.php
include('../../config/database.php'); // Include the database connection file


if (isset($_GET['case_id'])) {
    $caseId = $_GET['case_id'];

    // Fetch case details from the database
    $stmt = $pdo->prepare("SELECT * FROM cases WHERE id = ?");
    $stmt->execute([$caseId]);
    $case = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($case) {
        // Display case details
        echo "<h4>Case ID: {$case['case_id']}</h4>";
        echo "<p><strong>Victim Name:</strong> {$case['victim_name']}</p>";
        echo "<p><strong>Status:</strong> {$case['status']}</p>";
        echo "<p><strong>Incident Date:</strong> {$case['incident_date']}</p>";
        echo "<p><strong>Incident Type:</strong> {$case['incident_type']}</p>";
        echo "<p><strong>Incident Location:</strong> {$case['incident_location']}</p>";
        echo "<p><strong>Perpetrator Name:</strong> {$case['perpetrator_name']}</p>";
        echo "<p><strong>Perpetrator Relationship:</strong> {$case['perpetrator_relationship']}</p>";
        echo "<p><strong>Encoder Name:</strong> {$case['encoder_name']}</p>";
        echo "<p><strong>Case Notes:</strong> {$case['case_notes']}</p>";
    } else {
        echo "<p>No case found with that ID.</p>";
    }
}
?>
