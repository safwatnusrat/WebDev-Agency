<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];

require_once 'components/navbar.php';
require_once 'components/footer.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard | WebDevAgency</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    html, body {
      height: 100%;
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    .hero {
      background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
      color: white;
      padding: 100px 0;
    }

    .product-img {
      height: 200px;
      object-fit: cover;
    }

    .description {
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      text-overflow: ellipsis;
    }

    .card-body {
      display: flex;
      flex-direction: column;
    }

    .btn-order {
      margin-top: auto;
    }

    .see-more {
      color: #0d6efd;
      cursor: pointer;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<?php renderNavbar('home'); ?>

<main>
  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <div class="row align-items-center min-vh-80">
        <div class="col-lg-8 mx-auto text-center text-white">
          <h1 class="display-3 fw-bold mb-4">Our Portfolio</h1>
          <p class="lead mb-0">Showcasing our best work and successful projects</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Products Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <?php if (isset($_SESSION['order_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
          <strong>Order Placed Successfully!</strong> Thank you for your order.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['order_success']); ?>
      <?php endif; ?>
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Products</h2>
        <p class="text-muted">Explore and order what you need.</p>
      </div>
      <div class="row g-4">

      <?php
      $conn = new mysqli("localhost", "root", "", "web_dev2");
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $result = $conn->query("SELECT * FROM products");
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '
              <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                  <img src="' . $row["image"] . '" class="card-img-top product-img" alt="Product Image">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">' . htmlspecialchars($row["name"]) . '</h5>
                    <p class="card-text description" id="desc-' . $row["id"] . '">' . htmlspecialchars($row["description"]) . '</p>
                    <span class="see-more" onclick="toggleDescription(' . $row["id"] . ')">See more</span>
                    <p class="fw-bold text-primary mt-3">$' . number_format($row["price"], 2) . '</p>
                    
                   <form method="post" class="mt-auto" action="' . (isset($_SESSION["email"]) ? "order.php" : "register.html") . '">
                      <input type="hidden" name="product_id" value="' . $row["id"] . '">
                      <button type="submit" class="btn btn-primary w-100 btn-order">Order Now</button>
                    </form>
                   

                  </div>
                </div>
              </div>';
          }
      } else {
          echo '<p class="text-center">No products available at the moment.</p>';
      }

      $conn->close();
      ?>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<?php renderFooter(); ?>

<script>
function toggleDescription(id) {
  const desc = document.getElementById("desc-" + id);
  const btn = desc.nextElementSibling;
  desc.classList.toggle("description");
  btn.textContent = desc.classList.contains("description") ? "See more" : "See less";
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
