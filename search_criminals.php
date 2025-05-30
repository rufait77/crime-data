<?php
require_once 'db_connect.php'; // Ensure this connects $pdo

header('Content-Type: application/json');

// Get the query parameter (if empty, it will return all names)
$q = isset($_GET['q']) ? trim($_GET['q']) : '';

try {
    if ($q === '') {
        // If no query, return all names (limited to 20)
        $stmt = $pdo->query("SELECT id, name FROM criminal_data ORDER BY name ASC LIMIT 20");
    } else {
        // Search with case-insensitive prefix match
        $stmt = $pdo->prepare("SELECT id, name FROM criminal_data WHERE name LIKE :q ORDER BY name ASC LIMIT 20");
        $stmt->execute(['q' => $q . '%']);
    }

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error']);
    http_response_code(500);
}

?>