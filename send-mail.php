<?php
/**
 * BuildCBS Contact Form Handler
 *
 * Uses PHPMailer for SMTP email sending.
 * Install PHPMailer: composer require phpmailer/phpmailer
 * Or download from: https://github.com/PHPMailer/PHPMailer
 */

require_once 'includes/config.php';
require_once 'includes/csrf.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL . 'contact.php');
    exit;
}

// Verify CSRF token
$csrf_token = $_POST['csrf_token'] ?? '';
if (!verify_csrf($csrf_token)) {
    header('Location: ' . BASE_URL . 'contact.php?status=error&msg=invalid');
    exit;
}

// Honeypot spam check - if filled, it's a bot
$honeypot = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_SPECIAL_CHARS);
if (!empty($honeypot)) {
    error_log("Honeypot triggered - spam blocked from IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
    // Silently "succeed" so bot thinks submission worked
    header('Location: ' . BASE_URL . 'contact.php?status=success');
    exit;
}

// Sanitize inputs
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$project_type = trim(filter_input(INPUT_POST, 'project_type', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

// Validate required fields
if (empty($name) || empty($email) || empty($phone) || empty($project_type) || empty($message)) {
    header('Location: ' . BASE_URL . 'contact.php?status=error&msg=required');
    exit;
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . BASE_URL . 'contact.php?status=error&msg=required');
    exit;
}

// Check if PHPMailer is available
$phpmailerPath = __DIR__ . '/vendor/autoload.php';
$usePhpMailer = file_exists($phpmailerPath);

if ($usePhpMailer) {
    // Use PHPMailer (recommended)
    require $phpmailerPath;

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;

        // Recipients
        $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
        $mail->addAddress(SITE_EMAIL);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Quote Request: $project_type - " . SITE_NAME;

        $mail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #F5A623; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; background: #f9f9f9; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #3D4550; }
                .value { margin-top: 5px; }
                .footer { padding: 20px; text-align: center; font-size: 12px; color: #666; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>New Quote Request</h1>
                </div>
                <div class='content'>
                    <div class='field'>
                        <div class='label'>Name:</div>
                        <div class='value'>" . htmlspecialchars($name) . "</div>
                    </div>
                    <div class='field'>
                        <div class='label'>Email:</div>
                        <div class='value'><a href='mailto:" . htmlspecialchars($email) . "'>" . htmlspecialchars($email) . "</a></div>
                    </div>
                    <div class='field'>
                        <div class='label'>Phone:</div>
                        <div class='value'><a href='tel:" . htmlspecialchars($phone) . "'>" . htmlspecialchars($phone) . "</a></div>
                    </div>
                    <div class='field'>
                        <div class='label'>Project Type:</div>
                        <div class='value'>" . htmlspecialchars($project_type) . "</div>
                    </div>
                    <div class='field'>
                        <div class='label'>Message:</div>
                        <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
                    </div>
                </div>
                <div class='footer'>
                    <p>This message was sent from the " . SITE_NAME . " website contact form.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        $mail->AltBody = "
New Quote Request from " . SITE_NAME . " Website

Name: $name
Email: $email
Phone: $phone
Project Type: $project_type

Message:
$message
        ";

        $mail->send();
        header('Location: ' . BASE_URL . 'contact.php?status=success');
        exit;

    } catch (Exception $e) {
        error_log("Mail Error: " . $mail->ErrorInfo);
        header('Location: ' . BASE_URL . 'contact.php?status=error&msg=send');
        exit;
    }

} else {
    // Fallback: Use PHP mail() function
    $to = SITE_EMAIL;
    $subject = "New Quote Request: $project_type - " . SITE_NAME;

    $emailBody = "
New Quote Request from " . SITE_NAME . " Website

Name: $name
Email: $email
Phone: $phone
Project Type: $project_type

Message:
$message

---
Sent from: " . SITE_URL . "
    ";

    $headers = [
        'From' => SMTP_FROM_NAME . ' <' . SMTP_FROM . '>',
        'Reply-To' => "$name <$email>",
        'X-Mailer' => 'PHP/' . phpversion(),
        'Content-Type' => 'text/plain; charset=UTF-8'
    ];

    $headerString = '';
    foreach ($headers as $key => $value) {
        $headerString .= "$key: $value\r\n";
    }

    if (mail($to, $subject, $emailBody, $headerString)) {
        header('Location: ' . BASE_URL . 'contact.php?status=success');
        exit;
    } else {
        error_log("Mail Error: Failed to send using mail()");
        header('Location: ' . BASE_URL . 'contact.php?status=error&msg=send');
        exit;
    }
}
