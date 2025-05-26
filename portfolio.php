<?php
require_once 'components/navbar.php';
require_once 'components/footer.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio | WebDev Agency</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
 <?php renderNavbar('portfolio'); ?>

  <!-- Hero Section -->
  <section class="hero-section bg-primary text-white py-5">
    <div class="container">
      <div class="row align-items-center min-vh-80">
        <div class="col-lg-8 mx-auto text-center text-white">
          <h1 class="display-3 fw-bold mb-4">Our Portfolio</h1>
          <p class="lead mb-0">Showcasing our best work and successful projects</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Filter -->
  <section class="py-5">
    <div class="container">
     
      <!-- Portfolio Grid -->
      <div class="row g-4">
        <!-- E-commerce Project -->
        <div class="col-md-6 col-lg-4" data-category="ecommerce">
          <div class="card portfolio-card h-100">
            <img src="images/female-customer-reviewing-clothes.jpg" class="card-img-top" alt="E-commerce Platform">
            <div class="card-body">
      
              <h5 class="card-title">Fashion E-commerce Platform</h5>
              <p class="card-text text-muted">A modern online shopping experience with advanced filtering and secure checkout.</p>
            </div>
            <div class="card-footer  border-0">
              <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
            </div>
          </div>
        </div>

        <!-- Portfolio Website -->
        <div class="col-md-6 col-lg-4" data-category="web">
          <div class="card portfolio-card h-100">
            <img src="images/pp.webp" class="card-img-top" alt="Portfolio Website">
            <div class="card-body">
              <!-- <span class="badge bg-primary mb-2">Web Design</span> -->
              <h5 class="card-title">Creative Portfolio Website</h5>
              <p class="card-text text-muted">A minimalist portfolio showcase for a professional photographer.</p>
            </div>
            <div class="card-footer  border-0">
              <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
            </div>
          </div>
        </div>

        <!-- Corporate Website -->
        <div class="col-md-6 col-lg-4" data-category="web">
          <div class="card portfolio-card h-100">
            <img src="images/homepage-seen-computer-screen.jpg" class="card-img-top" alt="Corporate Website">
            <div class="card-body">
              <!-- <span class="badge bg-primary mb-2">Web Design</span> -->
              <h5 class="card-title">Corporate Website Redesign</h5>
              <p class="card-text text-muted">A complete overhaul of a consulting firm's digital presence.</p>
            </div>
            <div class="card-footer  border-0">
              <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
            </div>
          </div>
        </div>

        <!-- Startup Landing -->
        <div class="col-md-6 col-lg-4" data-category="web">
          <div class="card portfolio-card h-100">
            <img src="images/startup_landing_page.jpeg" class="card-img-top" alt="Startup Landing">
            <div class="card-body">
              <!-- <span class="badge bg-primary mb-2">Web Design</span> -->
              <h5 class="card-title">SaaS Landing Page</h5>
              <p class="card-text text-muted">High-converting landing page for a tech startup.</p>
            </div>
            <div class="card-footer  border-0">
              <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
            </div>
          </div>
        </div>

        <!-- Blog CMS -->
        <div class="col-md-6 col-lg-4" data-category="app">
          <div class="card portfolio-card h-100">
            <img src="images/blog_cms.jpeg" class="card-img-top" alt="Blog CMS">
            <div class="card-body">
              <!-- <span class="badge bg-primary mb-2">Application</span> -->
              <h5 class="card-title">Custom Blog CMS</h5>
              <p class="card-text text-muted">A powerful content management system for bloggers.</p>
            </div>
            <div class="card-footer  border-0">
              <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
            </div>
          </div>
        </div>

        <!-- Booking App -->
        <div class="col-md-6 col-lg-4" data-category="app">
          <div class="card portfolio-card h-100">
            <img src="images/booking_application.jpeg" class="card-img-top" alt="Booking App">
            <div class="card-body">
              <!-- <span class="badge bg-primary mb-2">Application</span> -->
              <h5 class="card-title">Appointment Booking System</h5>
              <p class="card-text text-muted">Smart scheduling solution for service-based businesses.</p>
            </div>
            <div class="card-footer border-0">
              <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4 text-center">
        <div class="col-md-3">
          <div class="display-4 fw-bold text-primary mb-2">100+</div>
          <p class="text-muted mb-0">Projects Completed</p>
        </div>
        <div class="col-md-3">
          <div class="display-4 fw-bold text-primary mb-2">50+</div>
          <p class="text-muted mb-0">Happy Clients</p>
        </div>
        <div class="col-md-3">
          <div class="display-4 fw-bold text-primary mb-2">5+</div>
          <p class="text-muted mb-0">Years Experience</p>
        </div>
        <div class="col-md-3">
          <div class="display-4 fw-bold text-primary mb-2">15+</div>
          <p class="text-muted mb-0">Team Members</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="mb-4">Ready to Start Your Project?</h2>
      <p class="lead mb-4">Let's create something amazing together</p>
      <a href="contact.html" class="btn btn-light btn-lg">Get in Touch</a>
    </div>
  </section>

  <!-- Footer -->
  <?php renderFooter(); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
