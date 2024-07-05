<?php
include('../includes/connection.php');
session_start();

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
 
// Include PHPMailer library files 
require '../assets/vendor/PHPMailer/Exception.php'; 
require '../assets/vendor/PHPMailer/PHPMailer.php'; 
require '../assets/vendor/PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = trim($_POST['name']);
    $company = trim($_POST['company']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $contact = trim($_POST['contact']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($company) || empty($email) || empty($address) || empty($contact) || empty($message)) {
        $_SESSION['feedback-error'] = "All fields are required.";
        header("Location: contact.php");
        exit();
    } else {
        // Insert feedback into the database
        $sql = "INSERT INTO tbl_feedback (f_name, company, email, address, contact, message, status, post_date) VALUES (?, ?, ?, ?, ?, ?, 'Unread', NOW(6))";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $company, $email, $address, $contact, $message);

        if ($stmt->execute()) {

            // Prepare the email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth   = true;
                $mail->Username   = 'hrdminnersparc@gmail.com'; // SMTP username
                $mail->Password   = 'jdlp bhiy wqur mkmu'; // SMTP password
                $mail->SMTPDebug = 0;
                $mail->SMTPSecure = 'tls';
                // $mail->Port = 3306;
                $mail->Port       = 587;

                //Recipients
                $mail->setFrom('no-reply@pdc.com', 'Panda Development Corp.');
                $mail->Sender = 'no-reply@pdc.com';
                $mail->addReplyTo('no-reply@pdc.com', 'Panda Development Corp.');
                $mail->addAddress($email, $name);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Thank you for your feedback';
                $mail->Body    = "
                <html>
                <head>
                <title>Thank you for your feedback</title>
                </head>
                <body>
                <p>Dear $name,</p>
                <p>Thank you for contacting us. We have received your message and will get back to you shortly.</p>
                <p><strong>Your Message:</strong></p>
                <p><i>$message</i></p>
                <p>Best regards,<br>Panda Development Corp.</p>
                </body>
                </html>
                ";

                $mail->send();
                $_SESSION['feedback-success'] = "Message submitted successfully.";
            } catch (Exception $e) {
                $_SESSION['feedback-error'] = "Message submitted, but failed to send email. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $_SESSION['feedback-error'] = "Failed to submit message. Please try again.";
        }

        $stmt->close();
        $conn->close();

        header("Location: contact.php");
        exit();
    }

} else {
    $_SESSION['feedback-error'] = "Invalid request.";
    header("Location: contact.php");
    exit();
}
?>