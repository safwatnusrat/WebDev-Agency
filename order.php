<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: register.html");
    exit();
}

// Check if product ID is sent
if (!isset($_POST['product_id'])) {
    header("Location: home.php");
    exit();
}

// Get user and product info
$email = $_SESSION['email'];
$product_id = intval($_POST['product_id']);

// Database connection
require 'config.php';

require_once 'components/navbar.php';
require_once 'components/footer.php';

// Fetch product details
$product_sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($product_sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$product_result = $stmt->get_result();

if ($product_result->num_rows === 0) {
    header("Location: home.php");
    exit();
}

$product = $product_result->fetch_assoc();

// Handle order confirmation
if (isset($_POST['confirm_order'])) {
    $order_sql = "INSERT INTO orders (user_email, product_id, order_date) VALUES (?, ?, NOW())";
    $order_stmt = $conn->prepare($order_sql);
    $order_stmt->bind_param("si", $email, $product_id);
    
    if ($order_stmt->execute()) {
        $_SESSION['order_success'] = true;
        header("Location: home.php");
        exit();
    }
}
$order_sql = "INSERT INTO orders (user_email, product_id, order_date) VALUES (?, ?, NOW())";
$order_stmt = $conn->prepare($order_sql);
$order_stmt->bind_param("si", $email, $product_id);


$conn->close();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Order Confirmation | WebDevAgency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .hero {
            background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
            padding: 60px 0;
            margin-bottom: 2rem;
        }
        .product-img {
            max-height: 300px;
            object-fit: cover;
            border-radius: 12px;
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .btn-confirm {
            background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
            border: none;
            padding: 12px 24px;
            font-weight: 600;
        }
        .btn-confirm:hover {
            background: linear-gradient(135deg, #0b5ed7 0%, #5b0edb 100%);
        }
    </style>
</head>
<body>    <?php renderNavbar('order'); ?>

    <!-- Hero Section -->
    <section class="hero text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold">Order Confirmation</h1>
                    <p class="lead">Please review your order details below</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Details Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?= htmlspecialchars($product['image']) ?>" class="img-fluid product-img mb-3 mb-md-0" alt="Product Image">
                                </div>
                                <div class="col-md-7">
                                    <h2 class="mb-3"><?= htmlspecialchars($product['name']) ?></h2>
                                    <p class="text-muted mb-4"><?= htmlspecialchars($product['description']) ?></p>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <span class="h4 mb-0">Price:</span>
                                        <span class="h4 text-primary mb-0">$<?= number_format($product['price'], 2) ?></span>
                                    </div>
                                    <form method="post" class="mt-4">
                                        <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                        <div class="d-grid gap-2">
                                            <button type="submit" name="confirm_order" class="btn btn-primary btn-confirm">
                                                Confirm Order
                                            </button>
                                            <a href="home.php" class="btn btn-light">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    <?php renderFooter(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
