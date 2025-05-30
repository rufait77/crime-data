<?php
// Start the session
session_start();

// Ensure the admin is logged in
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php"); // Redirect to login if not logged in
    exit();
}

// Get the admin's name from the session
$admin_name = $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f7;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-container {
            text-align: center;
            background: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .dashboard-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .dashboard-btn {
            width: 250px;
            padding: 15px;
            font-size: 1.2rem;
            margin: 10px 0;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    

    <div class="dashboard-container">
        <h2>Welcome, <?= htmlspecialchars($admin_name); ?>!</h2>
        
        <a href="insert_data.php" class="btn btn-primary dashboard-btn">Insert Criminal Data</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
