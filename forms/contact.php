<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/PHPMailer/src/Exception.php';
require '../assets/vendor/PHPMailer/src/PHPMailer.php';
require '../assets/vendor/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'aminedjebbie@gmail.com';
    $mail->Password   = 'ijxmsguyloamxtlb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('aminedjebbie@gmail.com', 'Portfolio Contact');
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->addAddress('aminedjebbie@gmail.com');

    $mail->Subject = $_POST['subject'];
    $mail->Body    =
        "Name: {$_POST['name']}\n" .
        "Email: {$_POST['email']}\n\n" .
        "Message:\n{$_POST['message']}";

    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
