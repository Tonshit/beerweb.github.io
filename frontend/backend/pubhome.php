<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product data from the POST request
    $product = json_decode($_POST['product'], true);
    $quantity = intval($_POST['quantity']);

    // Add the product to the cart
    $product['quantity'] = $quantity;
    $product['subtotal'] = (floatval(str_replace('₱', '', $product['price'])) * $quantity);
    $_SESSION['cart'][] = $product;

    // Return a success response
    echo json_encode(['status' => 'success', 'message' => "{$product['name']} (x{$quantity}) has been added to your cart!"]);
    exit;
}

// Return the current cart
echo json_encode($_SESSION['cart']);
?>