<!-- views/caselist.php -->
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Case ID</th>
            <th>Client Name</th>
            <th>Status</th>
            <th>Date Opened</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch only the 5 most recent cases
        $stmt = $pdo->query("SELECT * FROM cases ORDER BY incident_date DESC LIMIT 5");
        $cases = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cases as $case) {
            echo "<tr>
                <td>{$case['id']}</td>
                <td>{$case['id']}</td> <!-- Assuming Case ID is the same as ID here -->
                <td>{$case['victim_name']}</td>
                <td>{$case['status']}</td>
                <td>{$case['incident_date']}</td>
                <td>
                    <button class='btn btn-info btn-sm view-case' data-case-id='{$case['id']}'>View</button>
                    <a href='index.php?page=case&action=print&id={$case['id']}' class='btn btn-secondary btn-sm' target='_blank'>Print</a>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>

<!-- Modal to display case details -->
<?php include 'case_view_modal.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is loaded -->

<script>
    // Using jQuery to handle the modal and load case details dynamically
    $(document).ready(function() {
        console.log('Document is ready'); // Check if the document is loaded

        $('.view-case').on('click', function() {
            var caseId = $(this).data('case-id');
            console.log('View button clicked for Case ID: ' + caseId); // Log the clicked case ID
            
            // Send AJAX request to fetch case details
            $.ajax({
                url: 'views/dashboard/case_details.php', // Make sure this URL is correct
                method: 'GET',
                data: { id: caseId },  // Send the correct data (id)
                success: function(response) {
                    console.log('AJAX Success!'); // Check if the AJAX call is successful
                    $('#caseModal .modal-body').html(response); // Inject the content into the modal
                    $('#caseModal').modal('show'); // Show the modal
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + error); // Log errors if the AJAX call fails
                }
            });
        });
    });
</script>
