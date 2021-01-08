<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'provisioalert@gmail.com'; // YOUR gmail email
    $mail->Password = 'gmasata94p'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('provisioalert@gmail.com', 'Provisio');
    $mail->addAddress('lakshitha1629@gmail.com', '');
    $mail->addReplyTo('provisioalert@gmail.com', 'Provisio'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Provisio - Intelligent Criminal Detector";
    $mail->Body = '<b>Warning:</b> Criminal Detect!!';
    $mail->AltBody = 'Provisio - Intelligent Criminal Detector';

    $mail->send();
    // echo "Email message sent.";
} catch (Exception $e) {
    // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
