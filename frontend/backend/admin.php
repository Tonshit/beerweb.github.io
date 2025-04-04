<?php
header('Content-Type: application/json');
include 'db.php';

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT * FROM buyers");
    $buyers = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($buyers);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $conn->real_escape_string($data['name']);
    $address = $conn->real_escape_string($data['address']);
    $number = $conn->real_escape_string($data['number']);
    $totalPrice = $conn->real_escape_string($data['totalPrice']);

    $conn->query("INSERT INTO buyers (name, address, number, totalPrice) VALUES ('$name', '$address', '$number', '$totalPrice')");
    echo json_encode(['id' => $conn->insert_id]);
}

// Handle DELETE request
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = intval(basename($_SERVER['REQUEST_URI']));
    $conn->query("DELETE FROM buyers WHERE id = $id");
    echo json_encode(['success' => true]);
}

$conn->close();
?>