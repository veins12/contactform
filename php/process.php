<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Server-side validation
    if (empty($name) || empty($email) || empty($message)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();
    
    // Send Email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // SMTP Server
        $mail->SMTPAuth = true;
        $mail->Username = 'prajwalthapa21@gmail.com'; // Your Gmail
        $mail->Password = 'tnzm glmf bavl nvhr';  // Use App Password, NOT your real password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom('your_email@gmail.com', 'Contact Form');
        $mail->addAddress('recipient_email@example.com'); // Change to your recipient email
        $mail->addReplyTo($email, $name);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission";
        $mail->Body = "<h4>Name: $name</h4><p>Email: $email</p><p>Message: $message</p>";

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }

    $conn->close();
}
?>
