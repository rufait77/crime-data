<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Start the session
session_start();

// Include PHPMailer for sending emails
require 'vendor/autoload.php';

// Initialize variables
$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_mail'])) {
    $from_email = $_POST['from_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate inputs
    if (!filter_var($from_email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email address.";
    } else {
        // Setup PHPMailer
        $mail = new PHPMailer(true);

        try {
            // SMTP Configuration (Use Hostinger's SMTP settings)
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com'; // Hostinger SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'info@budgetwiseconsultants.com'; // Your email
            $mail->Password = '#Aminu_123'; // Your email password (or app password)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
            $mail->Port = 587; // SMTP port for TLS

            // Email Setup
            $mail->setFrom('info@budgetwiseconsultants.com', 'Budget Wise Consultants');
            $mail->addAddress('info@budgetwiseconsultants.com'); // Receiving email (same as sender)

            // Email Content
            $mail->isHTML(true);
            $mail->Subject = "New Message from Website: " . htmlspecialchars($subject);
            $mail->Body = "
                <h3>New Contact Request</h3>
                <p><strong>From:</strong> $from_email</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            ";

            // Send email
            $mail->send();
            $success_message = "Your message has been sent successfully!";
        } catch (Exception $e) {
            $error_message = "Error sending email: " . $mail->ErrorInfo;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Contact Us</h2>

        <!-- Display success or error messages -->
        <?php if ($success_message): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success_message) ?></div>
        <?php elseif ($error_message): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>

        <!-- Email Form -->
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Your Email</label>
                <input type="email" name="from_email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" name="send_mail" class="btn btn-primary">Send Mail</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
