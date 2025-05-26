<?php
require_once 'components/navbar.php';
require_once 'components/footer.php';
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>WebDev Agency | Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<?php renderNavbar('index'); ?>

<!-- Hero Section -->
<section class="bg-primary text-white py-5">
  <div class="container">
    <div class="row align-items-center min-vh-80">
      <div class="col-lg-6 text-white">
        <h1 class="display-3 fw-bold mb-4">Crafting Digital Excellence</h1>
        <p class="lead mb-5">We create responsive, modern, and result-driven web experiences that transform your digital presence.</p>
        <div class="d-flex gap-3">
          <a href="register.php" class="btn btn-light btn-lg">Get Started</a>
          <a href="portfolio.php" class="btn btn-outline-light btn-lg">View Our Work</a>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- ======= Slider Section ======= -->
<div id="projectCarousel" class="carousel slide my-5" data-bs-ride="carousel" style="max-width: 900px; margin: auto;">
  <div class="carousel-inner rounded shadow">
    <div class="carousel-item active">
      <img src="images/teamwork.jpeg" class="d-block w-100" alt="Project 1">
    </div>
    <div class="carousel-item">
      <img src="images/dev.jpeg" class="d-block w-100" alt="Project 2">
    </div>
    <div class="carousel-item">
      <img src="images/Agency.webp" class="d-block w-100" alt="Project 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- ======= Why Choose Us Section ======= -->
<section class="why-choose-us py-5 bg-light text-center">
  <div class="container">
    <h2 class="mb-4">Why Choose Us?</h2>
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3">
        <div class="p-4 bg-white rounded shadow-sm h-100">
          <i class="bi bi-award" style="font-size: 2rem; color: #007bff;"></i>
          <h5 class="mt-3">Quality Work</h5>
          <p>We deliver top-notch projects with attention to detail and excellence.</p>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="p-4 bg-white rounded shadow-sm h-100">
          <i class="bi bi-people" style="font-size: 2rem; color: #007bff;"></i>
          <h5 class="mt-3">Customer Focus</h5>
          <p>Your satisfaction is our priority. We tailor solutions to your needs.</p>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="p-4 bg-white rounded shadow-sm h-100">
          <i class="bi bi-lightning-charge" style="font-size: 2rem; color: #007bff;"></i>
          <h5 class="mt-3">Fast & Reliable</h5>
          <p>We ensure timely delivery with consistent and reliable support.</p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
  <div class="container text-center">
    <h2 class="mb-4">Ready to Start Your Project?</h2>
    <p class="lead mb-4">Let's create something amazing together</p>
    <a href="contact.html" class="btn btn-light btn-lg">Contact Us</a>
  </div>
</section>

<!-- Footer -->
<?php renderFooter(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
