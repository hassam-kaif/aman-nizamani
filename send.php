<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Get form data
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'hassamkaif123@gmail.com'; // Your Gmail
    $mail->Password   = 'qnft aane pqca bxrz'; // Use App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom('hassamkaif123@gmail.com', 'Website Form');
    $mail->addAddress('abenacarlosagent@email.com'); // Your receiving email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Form Submission';
    $mail->Body    = "
        <h1>New Contact</h1>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
    ";

    $mail->send();
    header('Location: https://facebook.com'); // Redirect after success
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
