<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: register.html");
    exit();
}

// Check if product ID is sent
if (!isset($_POST['product_id'])) {
    echo "Invalid request.";
    exit();
}

// Get user and product info
$email = $_SESSION['email'];
$product_id = intval($_POST['product_id']);

// Database connection
$conn = new mysqli("localhost", "root", "", "web_dev");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: You can fetch product details for confirmation
$product_sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($product_sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$product_result = $stmt->get_result();

if ($product_result->num_rows === 0) {
    echo "Product not found.";
    exit();
}

$product = $product_result->fetch_assoc();

// Optional: Insert order into an "orders" table
$order_sql = "INSERT INTO orders (user_email, product_id, order_date) VALUES (?, ?, NOW())";
$order_stmt = $conn->prepare($order_sql);
$order_stmt->bind_param("si", $email, $product_id);

if ($order_stmt->execute()) {
    echo "<h2>Order Placed Successfully!</h2>";
    echo "<p>Thank you, <strong>$email</strong>, for ordering <strong>" . htmlspecialchars($product['name']) . "</strong>.</p>";
    echo "<a href='home.php'>Back to Home</a>";
} else {
    echo "Failed to place order. Please try again.";
}

$conn->close();
?>
