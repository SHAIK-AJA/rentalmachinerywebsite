<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer library

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and send email
    // You may need to include validation and sanitization of form data here
    
    // Form data
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $machineName = $_POST['machineName'];
    $machineRating = $_POST['machineRating'];
    $machinePrice = $_POST['machinePrice'];
    $totalAmount = $_POST['totalAmount'];
    $numberOfDays = $_POST['numberOfDays'];
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com'; // Your SMTP username
        $mail->Password = 'your_password'; // Your SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to
        
        // Sender and recipient settings
        $mail->setFrom('your_email@example.com', 'Your Name'); // Your email address and name
        $mail->addAddress($userEmail, $userName); // Recipient email address and name
        
        // Email subject and content
        $mail->isHTML(true);
        $mail->Subject = 'Machine Booking Confirmation';
        $mail->Body = "
            <p>Hello $userName,</p>
            <p>Your payment was successful, and your booking has been confirmed. Here are the details:</p>
            <ul>
                <li>Machine Name: $machineName</li>
                <li>Machine Rating: $machineRating</li>
                <li>Price per day: $machinePrice</li>
                <li>Number of Days: $numberOfDays</li>
                <li>Total Amount: $totalAmount</li>
            </ul>
            <p>Please make sure to return the machine within the specified number of days ($numberOfDays days). Thank you for booking with us!</p>
        ";
        
        // Send email
        $mail->send();
        echo "Email sent successfully.";
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
} else {
    // Redirect to the payment page if accessed directly without submitting the form
    header("Location: payment_page.php");
    exit;
}
?>
