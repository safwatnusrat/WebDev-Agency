<?php
session_start();
// Check admin session here (implement your admin session check)
if (!isset($_SESSION['admin_email'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "web_dev2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query orders with user and product info
$sql = "
SELECT o.id AS order_id, u.name AS user_name, u.email AS user_email, p.name AS product_name, o.order_date
FROM orders o
JOIN users u ON o.user_email = u.email
JOIN products p ON o.product_id = p.id
ORDER BY o.order_date DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Order Check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<div class="container my-5">
    <h2>Orders List</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Product Name</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['order_id']) ?></td>
                    <td><?= htmlspecialchars($row['user_name']) ?></td>
                    <td><?= htmlspecialchars($row['user_email']) ?></td>
                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                    <td><?= htmlspecialchars($row['order_date']) ?></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">No orders found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
