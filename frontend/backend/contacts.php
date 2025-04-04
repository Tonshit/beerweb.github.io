<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Here you can add code to send the email or save the message to a database
    // For demonstration, we'll just return a success message

    // You can use mail() function to send an email
    // mail($to, $subject, $message, $headers);

    echo json_encode(['status' => 'success', 'message' => 'Thank you for contacting us, ' . $name . '!']);
    exit;
}
?>