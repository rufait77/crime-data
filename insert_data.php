<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Collect form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $crime = $_POST['crime'];
    $status = $_POST['status'];
    $location = $_POST['location'];
    $date_of_capture = $_POST['date_of_capture'];
    $time_of_capture = $_POST['time_of_capture'];
    $criminal_associates = $_POST['criminal_associates'];

    // Handle image upload
    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $target_dir = "assets/img/criminals/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . uniqid('criminal_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($image_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $image_path = $target_file;
        }
    }

    // Insert into DB
    $stmt = $pdo->prepare("
        INSERT INTO criminal_data 
        (name, age, crime, status, location, date_of_capture, time_of_capture, criminal_associates, image_path)
        VALUES 
        (:name, :age, :crime, :status, :location, :date_of_capture, :time_of_capture, :criminal_associates, :image_path)
    ");

    $stmt->execute([
        ':name' => $name,
        ':age' => $age,
        ':crime' => $crime,
        ':status' => $status,
        ':location' => $location,
        ':date_of_capture' => $date_of_capture,
        ':time_of_capture' => $time_of_capture,
        ':criminal_associates' => $criminal_associates,
        ':image_path' => $image_path
    ]);
}

// Fetch all records
$stmt = $pdo->query("SELECT * FROM criminal_data");
$criminals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Criminal Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Insert Criminal Record</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Age</label>
            <input type="number" name="age" class="form-control">
        </div>
        <div class="mb-3">
            <label>Crime</label>
            <input type="text" name="crime" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Wanted">Wanted</option>
                <option value="Convicted">Convicted</option>
                <option value="Captured">Captured</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control">
        </div>
        <div class="mb-3">
            <label>Date of Capture</label>
            <input type="date" name="date_of_capture" class="form-control">
        </div>
        <div class="mb-3">
            <label>Time of Capture</label>
            <input type="time" name="time_of_capture" class="form-control">
        </div>
        <div class="mb-3">
            <label>Criminal Associates</label>
            <textarea name="criminal_associates" class="form-control" rows="3" placeholder="List known associates..."></textarea>
        </div>
        <div class="mb-3">
            <label>Upload Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Insert Record</button>
    </form>

    <hr class="my-5">

    <h3>Criminal Records</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th><th>Age</th><th>Crime</th><th>Status</th><th>Location</th>
                <th>Date</th><th>Time</th><th>Associates</th><th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($criminals as $criminal): ?>
                <tr>
                    <td><?= htmlspecialchars($criminal['name']) ?></td>
                    <td><?= htmlspecialchars($criminal['age']) ?></td>
                    <td><?= htmlspecialchars($criminal['crime']) ?></td>
                    <td><?= htmlspecialchars($criminal['status']) ?></td>
                    <td><?= htmlspecialchars($criminal['location']) ?></td>
                    <td><?= htmlspecialchars($criminal['date_of_capture']) ?></td>
                    <td><?= htmlspecialchars($criminal['time_of_capture']) ?></td>
                    <td><?= nl2br(htmlspecialchars($criminal['criminal_associates'])) ?></td>
                    <td>
                        <?php if (!empty($criminal['image_path'])): ?>
                            <img src="<?= htmlspecialchars($criminal['image_path']) ?>" width="80">
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
