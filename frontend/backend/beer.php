<?php
// index.php

// Database connection parameters
$host = 'localhost'; // Change if your database is hosted elsewhere
$db = 'beer_shop'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // Your database password

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch beers from the database
$sql = "SELECT name, image, link FROM beers"; // Adjust the SQL query as per your database structure
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Beer Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="beer.css"> <!-- Link to the external CSS file -->
</head>
<body class="font-roboto">

    <div class="flex justify-between w-full p-4 bg-black bg-opacity-70">
        <!-- Left Navigation Menu -->
        <nav class="flex space-x-4">
            <a class="text-white hover:text-yellow-500" href="frontcover.html">HOME</a>
            <a class="text-white hover:text-yellow-500" href="beer.html">BEERS</a>
            <a class="text-white hover:text-yellow-500" href="about.html">ABOUT</a>
            <a class="text-white hover:text-yellow-500" href="cart.html">CART</a>
        </nav>
        <!-- Right Navigation Menu -->
        <nav class="flex space-x-4">
            <a class="text-white hover:text-yellow-500" href="event.html">EVENTS</a>
            <a class="text-white hover:text-yellow-500" href="https://beerandbrewing.com/category/Beer%20News/1/">NEWS</a>
            <a class="text-white hover:text-yellow-500" href="https://www.istockphoto.com/photos/drinking-beer">GALLERY</a>
            <a class="text-white hover:text-yellow-500" href="contact.html">CONTACT</a>
        </nav>
    </div>

    <main class="container mx-auto py-8 px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 h-screen">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="relative flex items-center justify-center">';
                    echo '<img alt="' . htmlspecialchars($row['name']) . '" class="w-full h-full object-cover" src="' . htmlspecialchars($row['image']) . '"/>';
                    echo '<div class="absolute bottom-4 left-4 right-4 flex justify-between">';
                    echo '<h2 class="text-2xl font-bold text-white">' . htmlspecialchars($row['name']) . '</h2>';
                    echo '<a href="' . htmlspecialchars($row['link']) . '" class="button mt-2">View Now</a>';
                    echo '</div></div>';
                }
            } else {
                echo '<p class="text-white">No beers found.</p>';
            }
            $conn->close();
            ?>
        </div>
    </main>
</body>
</html>