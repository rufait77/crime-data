<?php
// Start the session
session_start();

// Ensure the admin is logged in
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}

// Include database connection
require_once 'db_connect.php';

// Get the blog post ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid blog post ID.");
}
$blog_id = $_GET['id'];

// Fetch the blog post data
$stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = :id AND admin_name = :admin_name");
$stmt->execute([':id' => $blog_id, ':admin_name' => $_SESSION['admin_name']]);
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

// If no blog post found or unauthorized access
if (!$blog) {
    die("Blog post not found or unauthorized access.");
}

// Handle form submission (Updating the Blog)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Handle image update (optional)
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "assets/img/blogs/";
        $target_file = $target_dir . uniqid('blog_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($image_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $blog['image_path'] = $target_file; // Update new image path
        }
    }

    // Update query
    $stmt = $pdo->prepare("UPDATE blog_posts SET title = :title, content = :content, image_path = :image_path WHERE id = :id AND admin_name = :admin_name");
    $stmt->execute([
        ':title' => $title,
        ':content' => $content,
        ':image_path' => $blog['image_path'], // Keep existing image if not updated
        ':id' => $blog_id,
        ':admin_name' => $_SESSION['admin_name']
    ]);

    // Redirect back to blog management page
    header("Location: admin_blog.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Blog Post</h2>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($blog['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required><?= htmlspecialchars($blog['content']) ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Image</label>
            <?php if (!empty($blog['image_path'])): ?>
                <img src="<?= htmlspecialchars($blog['image_path']) ?>" width="100">
            <?php else: ?>
                <p>No image uploaded</p>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Upload New Image (optional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" name="update" class="btn btn-success">Update Blog</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
