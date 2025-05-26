<?php
session_start();
if (!isset($_SESSION['email']) && $_SESSION['email'] != 'admin@gmail.com') {
    header("Location: login.php");
    exit();
}

require 'config.php';
require_once 'components/navbar.php';
require_once 'components/footer.php';

// Create uploads folder if not exists
$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle product addition
if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $image_path = 'uploads/' . $image_name;
        $full_path = $uploadDir . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $full_path)) {
            $sql = "INSERT INTO products (name, price, description, image) 
                    VALUES ('$name', '$price', '$description', '$image_path')";
            mysqli_query($conn, $sql);
        } else {
            die("Error uploading image.");
        }
    }
    header("Location: dashboard.php");
    exit();
}

// Handle product deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header("Location: dashboard.php");
    exit();
}

// Handle product update
if (isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $image_path = 'uploads/' . $image_name;
        $full_path = $uploadDir . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $full_path)) {
            $sql = "UPDATE products SET name='$name', price='$price', description='$description', image='$image_path' WHERE id=$id";
        } else {
            die("Error uploading updated image.");
        }
    } else {
        $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";
    }
    mysqli_query($conn, $sql);
    header("Location: dashboard.php");
    exit();
}

$products = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f5f7fa;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .form-control, .btn {
            border-radius: 12px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        img.product-image {
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <?php renderNavbar('dashboard'); ?>
<div class="container py-5">
    <div class="bg-primary text-white p-4 rounded-4 shadow mb-5 d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <h1 class="display-5 fw-semibold mb-1">Welcome, Admin</h1>
            <p class="mb-0 fs-5">Manage your product listings from here efficiently and with ease.</p>
        </div>
        <div>
            <a href="admin_check_order.php" class="btn btn-light fw-semibold px-4 py-2 mt-3 mt-md-0 rounded-pill">Orders</a>
            <a href="logout.php" class="btn btn-light fw-semibold px-4 py-2 mt-3 mt-md-0 rounded-pill">Logout</a>
        </div>
    </div>
    
    <div class="card p-4 mb-5">
        <h4 class="mb-4 text-success">Add New Product</h4>
        <form method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="name" placeholder="Product Name" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="price" placeholder="Price" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <textarea name="description" placeholder="Description" class="form-control" required></textarea>
                </div>
                <div class="col-md-3">
                    <input type="file" name="image" class="form-control" required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" name="add_product" class="btn btn-dark w-100">Add Product</button>
            </div>
        </form>
    </div>

    <div class="card p-4">
        <h4 class="mb-4 text-info">All Products</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($products)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><img src="<?php echo $row['image']; ?>" class="product-image"></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>$<?php echo number_format($row['price'], 2); ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td>
                           <form method="POST" enctype="multipart/form-data" class="d-flex gap-2 align-items-center flex-wrap">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control form-control-sm" required>
                        <input type="number" name="price" value="<?php echo $row['price']; ?>" class="form-control form-control-sm" required>
                        <input type="text" name="description" value="<?php echo $row['description']; ?>" class="form-control form-control-sm" required>
                        <input type="file" name="image" class="form-control form-control-sm">
                        <div class="d-flex gap-2">
                        <button type="submit" name="update_product" class="btn btn-warning btn-sm">Update</button>
                        <a href="dashboard.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                  </div>
</form>

                            
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php renderFooter(); ?>
</body>

</html>
