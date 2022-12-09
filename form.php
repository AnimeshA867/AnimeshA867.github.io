<?php

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Validate the data
if (empty($name) || empty($email) || empty($message)) {
    // If any of the fields are empty, return an error
    echo "Error: All fields are required.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // If the email address is not valid, return an error
    echo "Error: Invalid email address.";
    exit;
}

// Set the recipient email address
$to = "animeshacharya867@gmail.com";

// Set the email subject
$subject = "$_POST['subject']";

// Build the email message
$message = "Name: $name\n";
$message .= "Email: $email\n\n";
$message .= "Message:\n$message";

// Set the email headers
$headers = "From: $name <$email>";

// Send the email
if (mail($to, $subject, $message, $headers)) {
    // If the email was sent successfully, return a success message
    echo "Success: Your message has been sent.";
} else {
    // If there was an error sending the email, return an error message
    echo "Error: There was a problem sending your message.";
}
?>