<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = stripslashes($_POST['name']);
        $email = stripslashes($_POST['email']);
        $phone = stripslashes($_POST['phone']);
        $comment = stripslashes($_POST['comments']);
        // $service = stripslashes($_POST['services']);

        $subject = 'Service Request'; // Define your email subject

        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = 2;
        // $mail->SMTPAuth = true;
        // $mail->IsSMTP();
        $mail->Host = 'mail.lizyweb.com';
        $mail->Username = 'smt@lizyweb.com';
        $mail->Password = 'Lizyweb@123';
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->Port = 587;

        $mail->setFrom('smt@lizyweb.com', $name);
        $mail->addAddress('ranjit@arkevision.com');
        $mail->Subject = $subject;

        // Create the HTML message
        $message = "Name: $name<br /><br />";
        $message .= "Email: $email<br /><br />";
        $message .= "Phone: $phone<br /><br />";
        // $message .= "Service: $service<br /><br />";
        $message .= "Comments: $comment";

        $mail->MsgHTML($message);

        // Send the email
        if ($mail->Send()) {
            echo "<fieldset>";
            echo "<div id='success_page'>";
            echo "<h1>Your Service Request Sent Successfully.</h1>";
            echo "<p>Thank you <strong>$name</strong>, your service request has been submitted. We will contact you shortly.</p>";
            echo "</div>";
            echo "</fieldset>";

            echo '<a href="index.html">Return to Home</a>';
        } else {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $e->getMessage();
    }
} else {
    echo "Invalid Request";
}
?>