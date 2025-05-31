<?php
require_once 'db_connect.php';
$stmt = $pdo->query("SELECT id, name, crime, date_of_capture FROM criminal_data ORDER BY id DESC");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
