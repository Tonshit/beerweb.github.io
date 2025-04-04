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

// Delete item from cart
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Get the raw POST data
    $data = json_decode(file_get_contents("php://input"));

    // Check if the id is set
    if (isset($data->id)) {
        $id = $data->id;

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM cart_items WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" indicates the type is integer

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "No ID provided.";
    }
}

// Close the database connection
$conn->close();
?>