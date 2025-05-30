<?php
require_once 'db_connect.php';

$q = $_GET['q'] ?? '';
if (strlen($q) < 1) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("SELECT DISTINCT name FROM criminal_data WHERE name LIKE :q ORDER BY name LIMIT 10");
$stmt->execute([':q' => $q . '%']);
$results = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($results);
?>
