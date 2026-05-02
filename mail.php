<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load Composer's autoloader

$mail = new PHPMailer(true);    // Passing `true` enables exceptions

try {
    // Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.example.com';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'your_username@example.com';            // SMTP username
    $mail->Password   = 'your_password';                        // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    // Recipients 
    $mail->setFrom('sender@example.com', 'Mailer');
    $mail->addAddress('recipient@example.com', 'Recipient');    // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Automated Email';
    $mail->Body    = 'This is a test email sent from a PHP script using PHPMailer.';
    $mail->AltBody = 'This is a test email sent from a PHP script using PHPMailer.';

    $mail->send();
    echo 'Email has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
