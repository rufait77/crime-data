<?php
// Include the database connection
require_once 'db_connect.php';

// Fetch all blog posts
$stmt = $pdo->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .blog-container {
            width: 100%;
            max-width: 1200px; /* Keeps content readable on larger screens */
            margin: auto;
            padding: 20px;
        }

        .blog-post {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background: white;
            margin-bottom: 20px;
        }

        .blog-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .blog-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
        }

        .blog-content {
            font-size: 1.3rem;
            margin-top: 10px;
        }

        .blog-meta {
            font-size: 1rem;
            color: gray;
        }

        .no-blogs {
            text-align: center;
            font-size: 1.5rem;
            color: red;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Navbar (Copying from index.php) -->
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

    <!-- Blog Page Content -->
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Latest Blog Posts</h2>

        <div class="blog-container">
            <?php if (count($blogs) > 0): ?>
                <?php foreach ($blogs as $blog): ?>
                    <div class="blog-post">
                        <h3 class="blog-title"><?= htmlspecialchars($blog['title']) ?></h3>
                        <p class="blog-meta">Posted by <?= htmlspecialchars($blog['admin_name']) ?> on <?= $blog['created_at'] ?></p>
                        <?php if (!empty($blog['image_path'])): ?>
                            <img src="<?= htmlspecialchars($blog['image_path']) ?>" class="blog-image" alt="Blog Image">
                        <?php endif; ?>
                        <p class="blog-content"><?= nl2br(htmlspecialchars($blog['content'])) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-blogs">No blog posts available.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
