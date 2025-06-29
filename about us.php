<?php
require_once 'components/navbar.php';
require_once 'components/footer.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | WebDev Agency</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <?php renderNavbar('about'); ?>
  <!-- Hero Section -->
  <section class="hero-section bg-primary text-white py-5">
    <div class="container">
      <div class="row align-items-center min-vh-80">
        <div class="col-lg-8 mx-auto text-center text-white">
          <h1 class="display-3 fw-bold mb-4">About WebDev Agency</h1>
          <p class="lead mb-0">Transforming ideas into digital reality since 2020</p>
        </div>
      </div>
    </div>
  </section>

  <!-- About Content -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <img src="images/teamwork.jpeg" class="img-fluid rounded-4 shadow" alt="Our Team">
        </div>
        <div class="col-lg-6">
          <h2 class="section-title">Our Story</h2>
          <p class="lead mb-4">We're a team of passionate developers, designers, and digital strategists.</p>
          <p class="text-muted mb-4">Founded with a vision to make web development accessible and impactful, WebDev Agency has grown into a full-service digital partner for businesses worldwide.</p>
          <div class="row g-4 mt-4">
            <div class="col-6">
              <div class="p-4 rounded-4">
                <h3 class="h2 mb-0 text-primary">100+</h3>
                <p class="mb-0">Projects Completed</p>
              </div>
            </div>
            <div class="col-6">
              <div class="p-4 rounded-4">
                <h3 class="h2 mb-0 text-primary">50+</h3>
                <p class="mb-0">Happy Clients</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title">Meet Our Team</h2>
        <p class="lead text-muted">The talented people behind our success</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card team-member h-100">
            <img src="images/ui_ux.webp" class="card-img-top" alt="Emily Park">
            <div class="card-body text-center">
              <h5 class="card-title mb-1">Safwat Nusrat</h5>
              <p class="text-muted">Project Manager</p>
              <p class="card-text">Leading our projects with precision and excellence.</p>
              <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card team-member h-100">
            <img src="images/lead_devv.jpg" class="card-img-top" alt="Nina Carter">
            <div class="card-body text-center">
              <h5 class="card-title mb-1">Nazmul Nahid</h5>
              <p class="text-muted">Lead Developer</p>
              <p class="card-text">Architecting robust and scalable solutions.</p>
              <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card team-member h-100">
            <img src="images/pm.jpg" class="card-img-top" alt="Sara Lee">
            <div class="card-body text-center">
              <h5 class="card-title mb-1">Pushpita Dhar</h5>
              <p class="text-muted">UX/UI Designer</p>
              <p class="card-text">Crafting beautiful and intuitive interfaces.</p>
              <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  <!-- Footer -->
<?php renderFooter(); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
