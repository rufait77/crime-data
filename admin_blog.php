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

// Include the database connection
require_once 'db_connect.php';

// Handle form submission to insert a new blog post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Handle image upload
    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "assets/img/blogs/";
        $target_file = $target_dir . uniqid('blog_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        
        // Check if it's a valid image file
        $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($image_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $image_path = $target_file;
        }
    }

    // Insert the blog post into the database
    $stmt = $pdo->prepare("INSERT INTO blog_posts (admin_name, title, content, image_path) VALUES (:admin_name, :title, :content, :image_path)");
    $stmt->execute([
        ':admin_name' => $admin_name,
        ':title' => $title,
        ':content' => $content,
        ':image_path' => $image_path
    ]);
}

// Handle delete request
if (isset($_POST['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM blog_posts WHERE id = :id AND admin_name = :admin_name");
    $stmt->execute([
        ':id' => $_POST['delete_id'],
        ':admin_name' => $admin_name
    ]);
}

// Fetch all blog posts by this admin
$stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE admin_name = :admin_name ORDER BY created_at DESC");
$stmt->execute([':admin_name' => $admin_name]);
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Blog Management</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Copying Navbar from index.php -->
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
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="real_estate.php">Real Estate</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin_login.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin_blog.php">Blog Management</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Blog Management Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Admin Blog Management</h2>

        <!-- Blog Submission Form -->
        <form method="POST" enctype="multipart/form-data" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Post Blog</button>
        </form>

        <!-- Display Existing Blogs -->
        <h3 class="text-center mb-3">Your Blog Posts</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                <?php foreach ($blogs as $blog): ?>
                <tr>
                    <td><?= htmlspecialchars($blog['title']) ?></td>
                    <td><?= htmlspecialchars($blog['content']) ?></td>
                    <td>
                        <?php if ($blog['image_path']): ?>
                            <img src="<?= htmlspecialchars($blog['image_path']) ?>" width="100">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <a href="edit_blog.php?id=<?= $blog['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="delete_id" value="<?= $blog['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
