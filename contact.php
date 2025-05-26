<?php
require_once 'components/navbar.php';
require_once 'components/footer.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact | WebDev Agency</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <?php renderNavbar('contact'); ?>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center min-vh-80">
        <div class="col-lg-8 mx-auto text-center text-white">
          <h1 class="display-3 fw-bold mb-4">Get in Touch</h1>
          <p class="lead mb-0">Let's discuss your project and create something amazing together</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Info Cards -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 text-center p-4">
            <div class="card-body">
              <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex p-3 mb-4">
                <i class="bi bi-geo-alt text-primary display-6"></i>
              </div>
              <h5 class="card-title">Visit Us</h5>
              <p class="text-muted">123 WebDev Street<br>Tech City, TC 12345<br>United States</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 text-center p-4">
            <div class="card-body">
              <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex p-3 mb-4">
                <i class="bi bi-envelope text-primary display-6"></i>
              </div>
              <h5 class="card-title">Email Us</h5>
              <p class="text-muted">hello@webdevagency.com<br>support@webdevagency.com</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 text-center p-4">
            <div class="card-body">
              <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex p-3 mb-4">
                <i class="bi bi-telephone text-primary display-6"></i>
              </div>
              <h5 class="card-title">Call Us</h5>
              <p class="text-muted">+1 234 567 890<br>+1 234 567 891</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-5">
              <h2 class="text-center mb-4">Send Us a Message</h2>
              <form>
                <div class="row g-4">
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                      <label for="name">Your Name</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                      <label for="email">Email Address</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                      <label for="subject">Subject</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <textarea class="form-control" id="message" style="height: 150px" placeholder="Type your message here..." required></textarea>
                      <label for="message">Message</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  </section>

  <!-- Footer -->
  <?php renderFooter(); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
