<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>

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

        .faq-item {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1rem;
            margin-top: auto;
        }

        .faq-item button {
            width: 100%;
            text-align: left;
            padding: 10px;
        }
    </style>
</head>

<body class="d-flex flex-column">

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
    <!-- FAQ Section -->

    <div class="header-image-container">
        <img src="assets/img/faq.jpg" alt="Title Image" class="img-fluid">
    </div>    
    <div class="container">
        <h2 class="section-heading">Frequently Asked Questions</h2>
        <!-- Question 1 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                What services do you offer?
            </button>
            <div id="faq1" class="collapse">
                <p>We provide financial performance analysis of financial institutions. Our services include:
                    <ul>
                        <li>Basic: Analysis of one company’s performance (3-day delivery).</li>
                        <li>Standard: Comparative analysis of two companies with investment recommendations (5-day delivery).</li>
                        <li>Premium: In-depth analysis of three companies, including a detailed report and investment strategy (7-day delivery).</li>
                    </ul>
                </p>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                Do you provide investment advice?
            </button>
            <div id="faq2" class="collapse">
                <p>No, we do not provide direct investment advice. We offer expert financial analysis and insights, allowing our clients to make informed investment decisions.</p>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                How do you conduct your financial analysis?
            </button>
            <div id="faq3" class="collapse">
                <p>We use a data-driven approach, evaluating key financial indicators, market trends, risk factors, and performance benchmarks to provide a comprehensive assessment of financial institutions.</p>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                How long does it take to receive my analysis report?
            </button>
            <div id="faq4" class="collapse">
                <p>
                    <ul>
                        <li>Basic: 3 days</li>
                        <li>Standard: 5 days</li>
                        <li>Premium: 7 days</li>
                    </ul>
                </p>
            </div>
        </div>

        <!-- New Question 5 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                What industries do you specialize in?
            </button>
            <div id="faq5" class="collapse">
                <p>We specialize in analyzing financial institutions such as banks, insurance companies, and other financial service providers or any other institutions.</p>
            </div>
        </div>

        <!-- New Question 6 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                Can I request a customized financial analysis?
            </button>
            <div id="faq6" class="collapse">
                <p>Yes, we can tailor our analysis to meet specific client needs. Please contact us to discuss your requirements.</p>
            </div>
        </div>

        <!-- New Question 7 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false" aria-controls="faq7">
                How can I get started?
            </button>
            <div id="faq7" class="collapse">
                <p>You can reach out to us via our website, email, or phone to discuss your needs and select the appropriate analysis package.</p>
            </div>
        </div>

        <!-- New Question 8 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                What makes your firm different?
            </button>
            <div id="faq8" class="collapse">
                <p>We are a team of financial experts with deep industry knowledge. Our independent and objective analysis helps clients make informed decisions based on factual data and insights.</p>
            </div>
        </div>

        <!-- New Question 9 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq9" aria-expanded="false" aria-controls="faq9">
                Do you offer follow-up consultations after delivering the report?
            </button>
            <div id="faq9" class="collapse">
                <p>Yes, we can provide additional clarifications or discussions upon request to help clients understand the analysis better.</p>
            </div>
        </div>

        <!-- New Question 10 -->
        <div class="faq-item">
            <button class="btn btn-link text-start" type="button" data-bs-toggle="collapse" data-bs-target="#faq10" aria-expanded="false" aria-controls="faq10">
                How do you ensure the confidentiality of client data?
            </button>
            <div id="faq10" class="collapse">
                <p>We strictly adhere to confidentiality policies and best practices to ensure that all client data and financial information remain secure.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 Budget Wise Consultancy. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
