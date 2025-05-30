<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}
require_once 'db_connect.php';

if (!isset($_GET['id'])) {
    echo "No ID provided!";
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM criminal_data WHERE id = ?");
$stmt->execute([$id]);
$criminal = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$criminal) {
    echo "Criminal not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criminal Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Criminal Record Details</h2>
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <?php if ($criminal['image_path']): ?>
                    <img src="<?= htmlspecialchars($criminal['image_path']) ?>" class="img-fluid rounded-start" alt="Criminal Image">
                <?php else: ?>
                    <p class="text-muted">No image available.</p>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p><strong>Name:</strong> <?= htmlspecialchars($criminal['name']) ?></p>
                    <p><strong>Age:</strong> <?= htmlspecialchars($criminal['age']) ?></p>
                    <p><strong>Crime:</strong> <?= htmlspecialchars($criminal['crime']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($criminal['status']) ?></p>
                    <p><strong>Location:</strong> <?= htmlspecialchars($criminal['location']) ?></p>
                    <p><strong>Items Recovered:</strong> <?= nl2br(htmlspecialchars($criminal['items_recovered'])) ?></p>
                    <p><strong>Date of Capture:</strong> <?= htmlspecialchars($criminal['date_of_capture']) ?></p>
                    <p><strong>Time of Capture:</strong> <?= htmlspecialchars($criminal['time_of_capture']) ?></p>
                    <p><strong>Criminal Associates:</strong> <?= nl2br(htmlspecialchars($criminal['criminal_associates'])) ?></p>
                    <p><strong>Incident Report:</strong> <em>(To be added later)</em></p>
                </div>
            </div>
        </div>
    </div>
    <a href="insert_data.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
