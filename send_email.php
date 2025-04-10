<?php
// Include Composer's autoloader to load PHPMailer
require 'vendor/autoload.php';

// Get data from the form (if you're using a form)
$name = $_POST['name'] ?? ''; // Use the null coalescing operator to handle undefined POST values
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$subject = $_POST['subject'] ?? '';

// Set the recipient email
$to = "gayan@smartledger.co";

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Set up SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server address (use your SMTP provider)
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@example.com'; //TODO change to Your email address
    $mail->Password = 'your-email-password'; // TODO change to Your email password or app-specific password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set the email sender and recipient
    $mail->setFrom('noreply@demosite.com', 'Demo Site');
    $mail->addAddress($to);

    // Set email content
    $mail->isHTML(false); // Set to true for HTML email
    $mail->Subject = $subject;
    $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

    // Send the email
    $mail->send();
    echo 'Email has been sent successfully!'; // Show success message

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
