<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; // Adjust path if PHPMailer is installed via Composer

header('Content-Type: application/json');

$response = ['type' => 'error', 'error' => '', 'elementErrors' => []];

try {
    // Validate form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);
    $course = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if (empty($name)) {
        $response['elementErrors']['name'] = ['errors' => ['Please enter your name']];
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['elementErrors']['email'] = ['errors' => ['Please enter a valid email address']];
    }
    if (empty($contact)) {
        $response['elementErrors']['contact'] = ['errors' => ['Please enter your contact number']];
    }
    if (empty($message)) {
        $response['elementErrors']['message'] = ['errors' => ['Please enter a message']];
    }

    if (!empty($response['elementErrors'])) {
        throw new Exception('Please correct the errors in the form.');
    }

    // Initialize PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'your.email@gmail.com'; // Replace with your SMTP username
    $mail->Password = 'your-app-password'; // Replace with your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email settings
    $mail->setFrom($email, $name);
    $mail->addAddress('inscricao@academy.monlarama.ao');
    $mail->Subject = 'New Inscription Form Submission';
    $mail->Body = "Name: $name\nEmail: $email\nContact: $contact\nCourse: $course\nMessage:\n$message";
    $mail->AltBody = "Name: $name\nEmail: $email\nContact: $contact\nCourse: $course\nMessage:\n$message";

    // Send email
    $mail->send();
    $response = ['type' => 'success', 'message' => 'Thank you for your submission!'];

} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
?>