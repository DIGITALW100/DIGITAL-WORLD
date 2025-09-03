<?php
$status = "echo";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "education10000000000@gmail.com"; // Apna email
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body = "
    <h2>New Contact Form Message</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Subject:</strong> $subject</p>
    <p><strong>Message:</strong><br>$message</p>
    ";

    if (mail($to, "Contact Form: $subject", $body, $headers)) {
        $status = "<p style='color:green;text-align:center;'>✅ Message sent successfully. Thank you!</p>";
    } else {
        $status = "<p style='color:red;text-align:center;'>❌ Message could not be sent. Please try again.</p>";
    }
}
?>