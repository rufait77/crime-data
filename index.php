<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
require_once 'db_connect.php';

// Fetch all distinct names
$query = $pdo->query("SELECT DISTINCT name FROM criminal_data");
$criminals = $query->fetchAll(PDO::FETCH_ASSOC);

// Fetch selected criminal's data
$criminalData = null;
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $stmt = $pdo->prepare("SELECT * FROM criminal_data WHERE name = :name");
    $stmt->execute([':name' => $name]);
    $criminalData = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<?php
// Fetch all criminals who have images
$stmt = $pdo->query("SELECT * FROM criminal_data WHERE image_path IS NOT NULL AND image_path != '' ORDER BY id DESC");
$carouselCriminals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>11 Signal Battalion's Criminal Database</title>
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
                            <a class="nav-link" href="#">Incident Reports</a>
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

    <!-- Header with Wide Image -->
    <div class="header-image-container">
        <img src="assets/img/camp_bg.jpg" alt="Title Image" class="img-fluid">
        <!-- <div class="header-title">
            <h1>BUDGET WISE CONSULTENCY</h1>
        </div> -->
    </div>

<div class="container mt-5">
    <h1 class="text-center">Criminal Database</h1>

    <div class="mb-4 position-relative">
        <input type="text" id="searchInput" class="form-control" placeholder="Search criminal by name..." autocomplete="off">
        <div id="suggestionBox" class="list-group position-absolute w-100 z-3" style="max-height: 200px; overflow-y: auto;"></div>
    </div>

    <?php if ($criminalData): ?>
        <div class="text-center mb-4">
            <h1><?= htmlspecialchars($criminalData['name']) ?></h1>
            <?php if (!empty($criminalData['image_path'])): ?>
                <img src="<?= htmlspecialchars($criminalData['image_path']) ?>" alt="Criminal Image" class="img-fluid"> 
            <?php else: ?>
                <p>No Image Available</p>
            <?php endif; ?>
        </div>
        <table class="table table-bordered">
            <tr><th>Age</th><td><?= htmlspecialchars($criminalData['age']) ?></td></tr>
            <tr><th>Crime</th><td><?= htmlspecialchars($criminalData['crime']) ?></td></tr>
            <tr><th>Status</th><td><?= htmlspecialchars($criminalData['status']) ?></td></tr>
            <tr><th>Location</th><td><?= htmlspecialchars($criminalData['location']) ?></td></tr>
            <tr><th>Items Recovered</th><td><?= nl2br(htmlspecialchars($criminalData['items_recovered'])) ?></td></tr>
            <tr><th>Date of Capture</th><td><?= htmlspecialchars($criminalData['date_of_capture']) ?></td></tr>
            <tr><th>Time of Capture</th><td><?= htmlspecialchars($criminalData['time_of_capture']) ?></td></tr>
            <tr><th>Criminal Associates</th><td><?= nl2br(htmlspecialchars($criminalData['criminal_associates'])) ?></td></tr>
        </table>
    <?php endif; ?>
</div>
<!-- Carousel -->
<div class="container mt-5">
    <h3 class="text-center mb-4">Recent Criminal Activity Highlights</h3>
    <div id="multiItemCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $chunks = array_chunk($carouselCriminals, 3);
            foreach ($chunks as $index => $group): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="row">
                        <?php foreach ($group as $criminal): ?>
                            <div class="col-md-4">
                                <div class="card">
                                <img src="<?= htmlspecialchars($criminal['image_path']) ?>" class="card-img-top" alt="Criminal Image" style="width: 100%; height: 250px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<footer>
     <p>© 11 Signal Battalion. All Rights Reserved.</p>
</footer>

    <!-- Bootstrap JS (Optional for functionality like dropdowns, modals, etc.) -->
    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!--Script for Live Search Filter-->
    <script>
        let allCriminalNames = [];

        document.addEventListener("DOMContentLoaded", () => {
            const input = document.getElementById("searchInput");
            const box = document.getElementById("suggestionBox");

            // Load all names once
            fetch("get_all_criminal_names.php")
                .then(res => res.json())
                .then(data => {
                    allCriminalNames = data;
                });

            function showSuggestions(query = "") {
                const filtered = query
                    ? allCriminalNames.filter(name =>
                        name.toLowerCase().includes(query.toLowerCase())
                    )
                    : allCriminalNames;

                box.innerHTML = "";
                filtered.slice(0, 10).forEach(name => {
                    const item = document.createElement("button");
                    item.classList.add("list-group-item", "list-group-item-action");
                    item.textContent = name;
                    item.addEventListener("click", () => {
                        input.value = name;
                        box.innerHTML = "";

                        const form = document.createElement("form");
                        form.method = "POST";
                        const hidden = document.createElement("input");
                        hidden.type = "hidden";
                        hidden.name = "name";
                        hidden.value = name;
                        form.appendChild(hidden);
                        document.body.appendChild(form);
                        form.submit();
                    });
                    box.appendChild(item);
                });
            }

            input.addEventListener("input", () => {
                showSuggestions(input.value.trim());
            });

            input.addEventListener("focus", () => {
                showSuggestions(); // show all on focus
            });

            document.addEventListener("click", (e) => {
                if (!input.contains(e.target) && !box.contains(e.target)) {
                    box.innerHTML = "";
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</body>
</html>
