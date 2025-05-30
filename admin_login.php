<?php
// Start the session
session_start();

// Include the database connection file
require_once 'db_connect.php';

// Initialize error message
$error_message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Get the input values from the form
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    // Prepare the SQL query to check the credentials
    $stmt = $pdo->prepare("SELECT * FROM admin_info WHERE admin_name = :admin_name AND password = :password");
    $stmt->execute([':admin_name' => $admin_name, ':password' => $password]);

    // Check if the credentials match
    if ($stmt->rowCount() > 0) {
        // Store admin name in session
        $_SESSION['admin_name'] = $admin_name;

        // Redirect to dashboard.php
        header("Location: dashboard.php");
        exit();
    } else {
        // Show error message if credentials do not match
        $error_message = "Credentials Do Not Match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f7;
            font-family: Arial, sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><h2>Budget Wise Consultancy</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BUDGET WISE CONSULTENCY</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="real_estate.php">Real Estate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_login.php">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="about_us.php">About Us</a></li>
                                <li><a class="dropdown-item" href="faq.php">FAQ</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="login-container">
        <h2 class="text-center mb-4">Admin Login</h2>

        <!-- Login Form -->
        <form method="POST">
            <div class="mb-3">
                <label for="admin_name" class="form-label">Admin Name</label>
                <input type="text" class="form-control" id="admin_name" name="admin_name" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Display error message if credentials do not match -->
            <?php if ($error_message): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $error_message; ?>
            </div>
            <?php endif; ?>

            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="forgot-password">
            <a href="#" onclick="showForgotPassword()">Forgot Password?</a>
        </div>
    </div>

    <script>
        // Function to display forgot password message
        function showForgotPassword() {
            alert("Contact Developer for new Password");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
