<?php
require_once 'components/navbar.php';
require_once 'components/footer.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services | WebDev Agency</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <?php renderNavbar('service'); ?>

  <!-- Hero Section -->
  <section class="hero-section bg-primary text-white py-5">
    <div class="container">
      <div class="row align-items-center min-vh-80">
        <div class="col-lg-8 mx-auto text-center text-white">
          <h1 class="display-3 fw-bold mb-4">Our Services</h1>
          <p class="lead mb-0">Comprehensive web solutions tailored to your needs</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Services -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title">What We Offer</h2>
        <p class="lead text-muted">End-to-end web development solutions for your business</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card service-card h-100">
            <div class="card-body p-4">
              <div class="mb-4">
                <i class="bi bi-laptop display-4 text-primary"></i>
              </div>
              <h4 class="card-title mb-3">Website Development</h4>
              <p class="card-text text-muted">Custom, scalable websites that look great and perform even better. We use modern technologies to create responsive and fast-loading sites.</p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card service-card h-100">
            <div class="card-body p-4">
              <div class="mb-4">
                <i class="bi bi-phone display-4 text-primary"></i>
              </div>
              <h4 class="card-title mb-3">Mobile-First Design</h4>
              <p class="card-text text-muted">Creating seamless experiences across all devices. Our mobile-first approach ensures your site looks and works perfectly everywhere.</p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card service-card h-100">
            <div class="card-body p-4">
              <div class="mb-4">
                <i class="bi bi-graph-up display-4 text-primary"></i>
              </div>
              <h4 class="card-title mb-3">SEO Optimization</h4>
              <p class="card-text text-muted">Boost your online visibility with our SEO services. We implement best practices to help you rank better in search results.</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Additional Services -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title">Additional Services</h2>
        <p class="lead text-muted">Complementary solutions to enhance your web presence</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0">
            <div class="card-body p-4">
              <i class="bi bi-cart text-primary h1 mb-3"></i>
              <h5>E-commerce Solutions</h5>
              <p class="text-muted">Custom online stores with secure payment integration</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0">
            <div class="card-body p-4">
              <i class="bi bi-pencil-square text-primary h1 mb-3"></i>
              <h5>Content Management</h5>
              <p class="text-muted">Easy-to-use CMS for content updates</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0">
            <div class="card-body p-4">
              <i class="bi bi-speedometer2 text-primary h1 mb-3"></i>
              <h5>Performance Optimization</h5>
              <p class="text-muted">Speed up your website for better user experience</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0">
            <div class="card-body p-4">
              <i class="bi bi-shield-check text-primary h1 mb-3"></i>
              <h5>Security Solutions</h5>
              <p class="text-muted">Protect your website from threats</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  <!-- CTA Section -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="mb-4">Ready to Start Your Project?</h2>
      <p class="lead mb-4">Let's discuss how we can help you achieve your goals</p>
      <a href="contact.html" class="btn btn-light btn-lg">Get in Touch</a>
    </div>
  </section>

  <!-- Footer -->
  <?php renderFooter(); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
