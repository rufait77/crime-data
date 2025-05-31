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
    $items_recovered = $_POST['items_recovered'];
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
        (name, age, crime, status, location, items_recovered, date_of_capture, time_of_capture, criminal_associates, image_path)
        VALUES 
        (:name, :age, :crime, :status, :location, :items_recovered, :date_of_capture, :time_of_capture, :criminal_associates, :image_path)
    ");

    $stmt->execute([
        ':name' => $name,
        ':age' => $age,
        ':crime' => $crime,
        ':status' => $status,
        ':location' => $location,
        ':items_recovered' => $_POST['items_recovered'] ?? null,
        ':date_of_capture' => $date_of_capture,
        ':time_of_capture' => $time_of_capture,
        ':criminal_associates' => $criminal_associates,
        ':image_path' => $image_path
    ]);
    // ✅ Redirect to avoid form resubmission
    header("Location: insert_data.php?success=1");
    exit();
}

// Fetch all records
$stmt = $pdo->query("SELECT * FROM criminal_data");
$criminals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (isset($_GET['deleted'])): ?>
    <div class="alert alert-warning">Record deleted successfully.</div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criminal Record Data Entry</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>

        body {
            padding-bottom: 100px;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1rem;
            margin-top: 50px;
            position: fixed;
        }
        .text-center p {
            font-size: 1.5rem; /* Increase the font size */
            font-weight: bold; /* Make the text bold */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><h2>11 Signal Battallion Criminal Database</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">11 Signal Battallion Criminal Database</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="incident_report_generator.php">Incident Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar Ends -->
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
                <option value="Released from Camp with Affidavit">Released from Camp with Affidavit</option>
                <option value="Released from Police Custody">Released from Police Custody</option>
            </select>

        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control">
        </div>
        <div class="mb-3">
            <label for="items_recovered" class="form-label">Items Recovered</label>
            <textarea name="items_recovered" id="items_recovered" class="form-control" rows="3" placeholder="List recovered items..."></textarea>
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

    <!-- Live Search Filter -->
    <div class="mb-4">
        <label for="searchBox" class="form-label">🔍 Search Criminal by Name</label>
        <input type="text" id="searchBox" class="form-control" placeholder="Type a name...">
        <div id="searchResults" class="list-group position-absolute w-50"></div>
    </div>

    <!-- Criminal Records Table -->

    <h3>Criminal Records</h3>
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Crime</th>
            <th>Status</th>
            <th>Location</th>
            <th>Items Recovered</th> <!-- ✅ New -->
            <th>Date</th>
            <th>Time</th>
            <th>Associates</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
    </thead>
        <tbody>
            <?php foreach ($criminals as $criminal): ?>
                <tr data-id="<?= $criminal['id'] ?>">
                    <td><?= htmlspecialchars($criminal['name']) ?></td>
                    <td><?= htmlspecialchars($criminal['age']) ?></td>
                    <td><?= htmlspecialchars($criminal['crime']) ?></td>
                    <td><?= htmlspecialchars($criminal['status']) ?></td>
                    <td><?= htmlspecialchars($criminal['location']) ?></td>
                    <td><?= nl2br(htmlspecialchars($criminal['items_recovered'])) ?></td> <!-- ✅ New -->
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
                    <td>
                        <button class="btn btn-sm btn-warning edit-btn">Edit</button>
                        <button class="btn btn-sm btn-success save-btn d-none">Save</button>
                        <form method="POST" action="delete_criminal.php" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                            <input type="hidden" name="id" value="<?= $criminal['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a href="view_criminal.php?id=<?= $criminal['id'] ?>" class="btn btn-sm btn-info">Open</a>
                    </td>
    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer>
     <p>© 11 Signal Battalion. All Rights Reserved.</p>
</footer>

<script>
        document.querySelectorAll(".edit-btn").forEach((editBtn, index) => {
            editBtn.addEventListener("click", () => {
                const row = editBtn.closest("tr");
                row.querySelectorAll("td").forEach((cell, i) => {
                    if (i < 9) { // Skip image & action columns
                        const text = cell.textContent.trim();
                        const input = document.createElement(i === 5 || i === 8 ? 'textarea' : 'input');
                        input.value = text;
                        input.className = 'form-control';
                        cell.innerHTML = '';
                        cell.appendChild(input);
                    }
                });
                editBtn.classList.add("d-none");
                row.querySelector(".save-btn").classList.remove("d-none");
            });
        });

        document.querySelectorAll(".save-btn").forEach((saveBtn) => {
            saveBtn.addEventListener("click", () => {
                const row = saveBtn.closest("tr");
                const id = row.dataset.id;
                const cells = row.querySelectorAll("td");

                const data = {
                    name: cells[0].querySelector('input')?.value || cells[0].textContent.trim(),
                    age: cells[1].querySelector('input')?.value,
                    crime: cells[2].querySelector('input')?.value,
                    status: cells[3].querySelector('input')?.value,
                    location: cells[4].querySelector('input')?.value,
                    items_recovered: cells[5].querySelector('textarea')?.value,
                    date_of_capture: cells[6].querySelector('input')?.value,
                    time_of_capture: cells[7].querySelector('input')?.value,
                    criminal_associates: cells[8].querySelector('textarea')?.value,
                };

                fetch('update_criminal.php?id=' + id, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(data)
                })
                .then(res => res.text())
                .then(res => {
                    location.reload(); // Or update row contents manually
                });
            });
        });
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const searchBox = document.getElementById("searchBox");
    const resultsDiv = document.getElementById("searchResults");

    searchBox.addEventListener("input", function () {
        const query = this.value.trim();

        fetch("search_criminals.php?q=" + encodeURIComponent(query))
            .then(res => res.json())
            .then(data => {
                resultsDiv.innerHTML = "";
                data.forEach(criminal => {
                    const link = document.createElement("a");
                    link.href = "view_criminal.php?id=" + criminal.id;
                    link.className = "list-group-item list-group-item-action";
                    link.textContent = criminal.name;
                    resultsDiv.appendChild(link);
                });

                if (data.length === 0 && query.length > 0) {
                    resultsDiv.innerHTML = `<div class="list-group-item text-muted">No matches</div>`;
                }
            });
    });

    // Show all names when focused and empty
    searchBox.addEventListener("focus", function () {
        if (this.value.trim() === "") {
            fetch("search_criminals.php?q=")
                .then(res => res.json())
                .then(data => {
                    resultsDiv.innerHTML = "";
                    data.forEach(criminal => {
                        const link = document.createElement("a");
                        link.href = "view_criminal.php?id=" + criminal.id;
                        link.className = "list-group-item list-group-item-action";
                        link.textContent = criminal.name;
                        resultsDiv.appendChild(link);
                    });
                });
        }
    });

    // Hide results when clicking outside
    document.addEventListener("click", function (e) {
        if (!searchBox.contains(e.target) && !resultsDiv.contains(e.target)) {
            resultsDiv.innerHTML = "";
        }
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>




</body>
</html>
