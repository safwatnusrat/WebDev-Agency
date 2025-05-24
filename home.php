<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard | WebDevAgency</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link href="style.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .hero {
      background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
      color: white;
      padding: 100px 0;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
    }
    .hero p {
      font-size: 1.2rem;
    }
    .product-img {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">WebDev<span class="text-primary">Agency</span></a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero text-center">
  <div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($email); ?>!</h1>
    <p class="mt-3">Browse and order your favorite products below.</p>
  </div>
</section>

<!-- Products Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Our Products</h2>
      <p class="text-muted">Explore and order what you need.</p>
    </div>
    <div class="row g-4">

    <?php
    $conn = new mysqli("localhost", "root", "", "web_dev");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT * FROM products");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="col-md-4">
              <div class="card h-100 shadow-sm">
                <img src="' . $row["image_url"] . '" class="card-img-top product-img" alt="Product Image">
                <div class="card-body">
                  <h5 class="card-title">' . htmlspecialchars($row["name"]) . '</h5>
                  <p class="card-text text-muted">' . htmlspecialchars($row["description"]) . '</p>
                  <p class="fw-bold text-primary">$' . number_format($row["price"], 2) . '</p>
                  <form method="post" action="order.php">
                    <input type="hidden" name="product_id" value="' . $row["id"] . '">
                    <button type="submit" class="btn btn-primary w-100">Order Now</button>
                  </form>
                </div>
              </div>
            </div>
            ';
        }
    } else {
        echo '<p class="text-center">No products available at the moment.</p>';
    }

    $conn->close();
    ?>

    </div>
  </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <h5 class="mb-3">WebDevAgency</h5>
          <p class="text-muted">Creating digital experiences that matter.</p>
        </div>
        <div class="col-md-4">
          <h5 class="mb-3">Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="index.html">Home</a></li>
            <li><a href="about us.html">About Us</a></li>
            <li><a href="service.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5 class="mb-3">Follow Us</h5>
          <div class="d-flex gap-3">
            <a href="#" class="text-decoration-none">
              <i class="bi bi-facebook fs-5"></i>
            </a>
            <a href="#" class="text-decoration-none">
              <i class="bi bi-twitter fs-5"></i>
            </a>
            <a href="#" class="text-decoration-none">
              <i class="bi bi-linkedin fs-5"></i>
            </a>
            <a href="#" class="text-decoration-none">
              <i class="bi bi-instagram fs-5"></i>
            </a>
          </div>
        </div>
      </div>
      <hr class="my-4">
      <div class="text-center">
        <p class="mb-0">&copy; 2025 WebDevAgency. All rights reserved.</p>
      </div>
    </div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
