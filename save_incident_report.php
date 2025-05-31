<?php
require_once 'db_connect.php';
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$report = $data['report'];

$stmt = $pdo->prepare("UPDATE criminal_data SET incident_report = :report WHERE id = :id");
$stmt->execute([':report' => $report, ':id' => $id]);

echo "Incident report saved successfully.";
?>
