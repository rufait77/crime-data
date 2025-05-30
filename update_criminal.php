<?php
require_once 'db_connect.php';

$id = $_GET['id'] ?? null;
$data = json_decode(file_get_contents("php://input"), true);

if ($id && $data) {
    $stmt = $pdo->prepare("
        UPDATE criminal_data SET
            name = :name,
            age = :age,
            crime = :crime,
            status = :status,
            location = :location,
            items_recovered = :items_recovered,
            date_of_capture = :date_of_capture,
            time_of_capture = :time_of_capture,
            criminal_associates = :criminal_associates
        WHERE id = :id
    ");

    $stmt->execute([
        ':name' => $data['name'],
        ':age' => $data['age'],
        ':crime' => $data['crime'],
        ':status' => $data['status'],
        ':location' => $data['location'],
        ':items_recovered' => $data['items_recovered'],
        ':date_of_capture' => $data['date_of_capture'],
        ':time_of_capture' => $data['time_of_capture'],
        ':criminal_associates' => $data['criminal_associates'],
        ':id' => $id
    ]);

    echo "Updated";
} else {
    echo "Invalid request";
}
