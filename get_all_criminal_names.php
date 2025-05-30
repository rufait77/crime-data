<?php
require_once 'db_connect.php';

$stmt = $pdo->query("SELECT DISTINCT name FROM criminal_data ORDER BY name");
$names = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($names);
?>
