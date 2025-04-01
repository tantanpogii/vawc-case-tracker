<?php include 'views/nav.php'; // Include navigation bar ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - VAWC Case Tracker</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Welcome to the Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

    <!-- Dashboard Overview -->
    <div class="row mt-4">
        <!-- Card 1: Total Cases -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Cases</h5>
                    <p class="card-text"><?php echo $total_cases; ?> Cases</p>
                </div>
            </div>
        </div>

        <!-- Card 2: Active Cases -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Active Cases</h5>
                    <p class="card-text"><?php echo $active_cases; ?> Active</p>
                </div>
            </div>
        </div>

        <!-- Card 3: Pending Cases -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Pending Cases</h5>
                    <p class="card-text"><?php echo $pending_cases; ?> Pending</p>
                </div>
            </div>
        </div>

        <!-- Card 4: Closed Cases -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">Closed Cases</h5>
                    <p class="card-text"><?php echo $closed_cases; ?> Closed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the Case List Here -->
    <div class="mt-4">
        <h3>Recent Cases</h3>
        <?php include 'views/dashboard/case_list.php'; ?>  <!-- This includes the caselist.php -->
    </div>

</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
