<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $date = $_POST['date'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    echo "<h1>Order Confirmation</h1>";
    echo "<p>Date: $date</p>";
    echo "<p>Name: $name</p>";
    echo "<p>Address: $address</p>";
    echo "<p>Phone Number: $number</p>";
} else {
    echo "Invalid request.";
}
?>