<?php
$servername = "localhost"; // Your server name
$username = "username"; // Your database username
$password = "password"; // Your database password
$dbname = "your_database"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart items
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM cart_items";
    $result = $conn->query($sql);
    $cartItems = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cartItems[] = $row;
        }
    }
    echo json_encode($cartItems);
}

// Add item to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO cart_items (name, price, image, quantity) VALUES ('$name', '$price', '$image', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>