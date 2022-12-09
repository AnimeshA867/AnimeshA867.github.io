<?php

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Validate the data
if (empty($name) || empty($email) || empty($message)) {
    // If any of the fields are empty, return an error
    $result = array('status' => 'error', 'message' => 'All fields are required.');
    echo json_encode($result);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // If the email address is not valid, return an error
    $result = array('status' => 'error', 'message' => 'Invalid email address.');
    echo json_encode($result);
    exit;
}

// Set the recipient email address
$to = "animeshacharya867@gmail.com";

// Set the email subject
$subject = "New message from $name";

// Build the email message
$message = "Name: $name\n";
$message .= "Email: $email\n\n";
$message .= "Message:\n$message";

// Set the email headers
$headers = "From: $name <$email>";

// Send the email
if (mail($to, $subject, $message, $headers)) {
    // If the email was sent successfully, return a success message
    $result = array('status' => 'success', 'message' => 'Your message has been sent.');
    echo json_encode($result);
} else {
    // If there was an error sending the email, return an error message
    $result = array('status' => 'error', 'message' => 'There was a problem sending your message.');
    echo json_encode($result);
}
?>