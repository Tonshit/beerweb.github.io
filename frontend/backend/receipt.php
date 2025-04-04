<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'db.php'; // Include the database connection

// Handle GET request to retrieve a receipt
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM receipts WHERE id = ?");
    $stmt->execute([$id]);
    $receipt = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($receipt) {
        echo json_encode($receipt);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'Receipt not found']);
    }
}

// Handle POST request to create a new receipt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (isset($data['customerName'], $data['customerAddress'], $data['customerNumber'], $data['cart'])) {
        $stmt = $pdo->prepare("INSERT INTO receipts (customerName, customerAddress, customerNumber, cart) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['customerName'], $data['customerAddress'], $data['customerNumber'], json_encode($data['cart'])]);
        
        $newReceiptId = $pdo->lastInsertId();
        echo json_encode(['id' => $newReceiptId]);
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid input']);
    }
}
?>