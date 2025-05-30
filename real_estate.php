<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUDGET WISE CONSULTENCY</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin-top: 80px;
            padding-bottom: 100px;
        }

        .hero-section {
            background: url('assets/img/real-estate-hero.jpg') no-repeat center center/cover;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
        }

        .hero-text {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 600;
        }

        .section-heading {
            text-align: center;
            margin: 40px 0;
            font-size: 2rem;
            font-weight: 600;
        }

        .card-body {
            text-align: center;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-section {
            background-color: #e9ecef;
            padding: 50px 0;
            text-align: center;
            
        }

        .contact-section h2 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .contact-section p {
            font-size: 1.1rem;
            color: #555;
        }

        .amharic-text {
            background-color: #f0f0f0;
            padding: 20px;
            border-left: 5px solid #6c757d;
            font-size: 1.2rem;
            margin-top: 30px;
            padding-bottom: 60px;
        }

        .amharic-text p {
            margin-bottom: 20px;
        }

        /* Ensure responsiveness */
        @media (max-width: 767px) {
            .hero-text {
                font-size: 1.8rem;
            }

            .section-heading {
                font-size: 1.5rem;
            }
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

        .real-estate-header {
            background-color: black;
            color: white;
            padding: 20px;
            font-size: 3rem; /* Increase the font size */
            font-weight: 600;
            border: 5px solid gold; /* Golden border */
            text-align: center;
        }
        /* Ensure responsiveness */
        @media (max-width: 767px) {
            .real-estate-header {
                font-size: 2.5rem; /* Adjust size on smaller screens */
            }
        }
        
    </style>
</head>

<body>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Budget Wise Consultancy</a>
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
                </div>
            </div>
        </div>
    </nav>

    <!-- Header with Wide Image -->
    <div class="header-image-container">
        <img src="assets/img/IMG_7224.jpeg" alt="Title Image" class="img-fluid">
        <div class="real-estate-header">
            <h1>REAL ESTATE</h1>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-text">
            <h1>At Budget Wise Consultancy, we’re your trusted guide to Ethiopia’s dynamic real estate market.</h1>
        </div>
    </section>

    <!-- What We Will Do Section -->
    <section class="container">
        <div class="section-heading">
            <h2>What We Will Do</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <h4>Analyze Properties</h4>
                    <p>We will help you make informed decisions by analyzing all the real estate offerings on the ground, including price, location, and construction status.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h4>Provide Tailored Advice</h4>
                    <p>Our team provides tailored advice to help you avoid overpaying, spot opportunities, and secure the best returns.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h4>Investigate Contracts</h4>
                    <p>We investigate sales contracts and provide valuable advice on how to approach each deal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <h2>Contact Us for More Information</h2>
        <p>Contact us to learn more about our services and how we can help you make informed, strategic decisions in real estate.</p>
    </section>

    <!-- Amharic Section -->
    <section class="container amharic-text">
        <h2>ቤት ለመግዛት አስበዋል ?</h2>
        <br>
        <p>ጥረው ግረው ያፈሩትን ሃብት ሪል እስቴት ላይ ማዋል ቀላል ውሳኔ አይደለም።</p>
        <p>የጥናት ቡድናችን በአዲስ አበባ እና ዙሪያዋ ለሸያጭ የቀረቡትን ቤቶች ዳስሷል።</p>
        <p>ከመረጃዎቹ በመነሳት በሚከተሉት ጉዳዮች ላይ ምክራችንን እንለግሳችን።</p>
        <br>
        <p>&emsp;•	ገበያው ላይ ያሉትን የሪል እስቴት ቤቶች ዝርዘዝር ከዋጋው ያሉበትን ቦታ፧ ግንባታው ያለበትን ደረጃ መረጃ እንሰጣለን።</p>
        <p>&emsp;•	ለውሳኔ ያመቾት ዘንድ የቀረቡትን ቤቶች ከጥቅምና ጉዳት፧ ከረጅም ጊዜ እና አጭር ጊዜ አኳያ ያለውን እንድምታ ምክር እንለግሳለን</p>
        <p>&emsp;•	በመረጡት የሪል እስቴት ድርጅት ጋር የሚገቡትን ውል ይዘት እንመረምራለን ፥ እናማክራለን። </p>
        <br>
        <br>
        <p>ለበለጠ መረጃ በአድራሻችን ያግኙን</p>
    </section>

    <footer class="d-flex justify-content-between align-items-center p-3 bg-dark text-white">
        <!-- Left side: Send Email link -->
        <a href="send_email.php" class="text-white text-decoration-none">Send Us Email</a>

        <!-- Center: Copyright text -->
        <p class="m-0 text-center flex-grow-1">© 2025 Budget Wise Consultancy. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
