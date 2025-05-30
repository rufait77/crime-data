<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .section-heading {
            font-size: 2.5rem;
            font-weight: 600;
            text-align: center;
            margin-top: 40px;
            color: #343a40;
        }

        .about-text,
        .contact-section {
            font-size: 1.2rem;
            color: #555;
        }

        .contact-section {
            background-color: #f8f9fa;
            padding: 50px;
            margin-top: 50px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><h2>Budget Wise Consultancy</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BUDGET WISE CONSULTENCY</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="real_estate.php">Real Estate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_login.php">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="about_us.php">About Us</a></li>
                                <li><a class="dropdown-item" href="faq.php">FAQ</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- About Us Section -->
    <div class="header-image-container">
        <img src="assets/img/about_us_1.jpg" alt="Title Image" class="img-fluid">
    </div>    
        
    <div class="container">
        <h2 class="section-heading">About Us</h2>

        <div class="about-text">
            <p>At Budget Wise Consultancy, we are a small but dedicated team of finance experts passionate about helping clients make informed investment decisions. With years of experience in financial analysis and market research, we specialize in providing detailed evaluations of financial statements and in-depth analysis of Ethiopia’s real estate market.</p>
            <p>Our approach is data-driven and insightful, ensuring that our clients receive accurate, reliable, and strategic advice for their investments. Whether you're looking to invest in Ethiopia’s banking and insurance sector or exploring opportunities in real estate, we provide expert guidance to help you maximize returns and minimize risks.</p>
            <p>At Budget Wise Consultancy, your financial success is our priority. Let us help you make the right investment decisions with confidence.</p>
        </div>

        <!-- Contact Us Section -->
        <div class="contact-section">
            <h2 class="section-heading">Contact Us</h2>
            <p>If you have any questions or need more information, feel free to reach out to us. We are here to help you with your investment decisions.</p>
            <p>Email: info@budgetwiseconsultancy.com</p>
            <p>Phone: +97 452 010 185</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 Budget Wise Consultancy. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS (Optional for functionality like dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
