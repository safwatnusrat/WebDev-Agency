<?php
session_start();
// Check admin session here (implement your admin session check)
if (!isset($_SESSION['email']) && $_SESSION['email'] != 'admin@gmail.com') {
    header("Location: login.php");
    exit();
}

require_once 'components/navbar.php';
require_once 'components/footer.php';
require 'config.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query orders with user and product info
$sql = "
SELECT 
    o.id AS order_id,
    u.fullname AS user_name,
    u.email AS user_email,
    p.name AS product_name,
    p.price AS product_price,
    o.order_date
FROM orders o
JOIN users u ON o.user_email = u.email
JOIN products p ON o.product_id = p.id
ORDER BY o.order_date DESC
";

$result = $conn->query($sql);

// Calculate total sales
$totalSales = 0;
$totalOrders = 0;
if ($result && $result->num_rows > 0) {
    $totalOrders = $result->num_rows;
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $totalSales += $row['product_price'];
        $rows[] = $row;
    }
    // Reset pointer for later use
    mysqli_data_seek($result, 0);
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Order Check | WebDevAgency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .hero {
            background:  #0d6efd ;
            padding: 60px 0;
            margin-bottom: 2rem;
            position: relative;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        main {
            flex: 1;
        }
        .table {
            vertical-align: middle;
        }
        .btn-back {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <?php renderNavbar('admin-orders'); ?>
    
    <!-- Hero Section -->    
     <section class="hero text-white">
        <div class="container position-relative">
           
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold">Orders Management</h1>
                    <p class="lead">View and manage all customer orders</p>
                </div>
            </div>
        </div>
    </section>

    <main>
        <div class="container my-5">
            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                                    <i class="bi bi-cart-check text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">Total Orders</h6>
                                    <h2 class="mb-0"><?= $totalOrders ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                                    <i class="bi bi-currency-dollar text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">Total Sales</h6>
                                    <h2 class="mb-0">$<?= number_format($totalSales, 2) ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="card border-0">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">        <thead class="table-light">
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Product</th>
                <th>Price</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>                <tr>
                    <td>#<?= str_pad($row['order_id'], 5, '0', STR_PAD_LEFT) ?></td>
                    <td><?= htmlspecialchars($row['user_name']) ?></td>
                    <td>
                        <a href="mailto:<?= htmlspecialchars($row['user_email']) ?>" class="text-decoration-none">
                            <?= htmlspecialchars($row['user_email']) ?>
                        </a>
                    </td>
                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                    <td>$<?= number_format($row['product_price'], 2) ?></td>
                    <td><?= date('M d, Y H:i', strtotime($row['order_date'])) ?></td>
                    <td>
                        <span class="badge bg-success">Completed</span>
                    </td>
                </tr>
                <?php endwhile; ?>            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <div class="text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            No orders found
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php renderFooter(); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
