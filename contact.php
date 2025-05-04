<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields and sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Set recipient email address
    $to = "isaacprnz@gmail.com"; 
    $subject = "New Contact Form Message";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "Sorry, your message could not be sent.";
    }
} else {
    echo "Invalid request.";
}
?>
