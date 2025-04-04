<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Here you can process the data, e.g., save it to a database or send an email
    // For demonstration, we'll just echo the data back
    echo "<h1>Thank you for contacting us, $name!</h1>";
    echo "<p>Your message: $message</p>";
    echo "<p>We will get back to you at <strong>$email</strong>.</p>";
} else {
    // Redirect to the home page if the request method is not POST
    header("Location: index.php");
    exit();
}
?>