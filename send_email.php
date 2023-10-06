<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "recipient@example.com"; // Replace with the actual email address where you want to receive messages.

    // Set email subject
    $subject = "Message from $name via Contact Form";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Attempt to send the email
    if (mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully
        header("Location: thank-you.html"); // Redirect to a thank-you page
        exit;
    } else {
        // Email sending failed
        header("Location: error.html"); // Redirect to an error page
        exit;
    }
} else {
    // Handle the case where the form was not submitted
    header("Location: index.html"); // Redirect back to the contact form
    exit;
}
?>
