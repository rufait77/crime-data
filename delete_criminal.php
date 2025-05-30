<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}

require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Optionally delete image file
    $stmt = $pdo->prepare("SELECT image_path FROM criminal_data WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($record && !empty($record['image_path']) && file_exists($record['image_path'])) {
        unlink($record['image_path']);
    }

    // Delete record
    $stmt = $pdo->prepare("DELETE FROM criminal_data WHERE id = :id");
    $stmt->execute([':id' => $id]);

    // Redirect back
    header("Location: insert_data.php?deleted=1");
    exit();
}
?>
