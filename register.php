<?php
require 'config.php';
require_once 'components/navbar.php';
require_once 'components/footer.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and collect POST data
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Regex patterns
    $namePattern = "/^[a-zA-Z\s]{2,50}$/";               // Only letters and spaces, 2-50 characters
    $usernamePattern = "/^.{6,}$/";    // Alphanumeric and underscore, 4-20 characters
    $emailPattern = "/^[a-z0-9]+@(gmail|yahoo)\.com$/"; // Basic email regex
    $passwordPattern = "/^(?=.*[A-Z])(?=.*\d).{6,}$/";   // At least 6 chars, 1 uppercase, 1 digit

    // Validation checks
    if (!preg_match($namePattern, $fullname)) {
        echo "<script>alert('Invalid full name. Use only letters and spaces (2-50 characters).'); window.location='register.html';</script>";
        exit();
    }

    if (!preg_match($usernamePattern, $username)) {
        echo "<script>alert('Invalid username. Use 4-20 characters, letters, numbers, and underscores.'); window.location='register.html';</script>";
        exit();
    }

    if (!preg_match($emailPattern, $email)) {
        echo "<script>alert('Invalid email format.'); window.location='register.html';</script>";
        exit();
    }

    if (!preg_match($passwordPattern, $password)) {
        echo "<script>alert('Password must be at least 6 characters long, include 1 uppercase letter and 1 number.'); window.location='register.html';</script>";
        exit();
    }

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.location='register.html';</script>";
        exit();
    }

    // Escape input for SQL
    $fullname = mysqli_real_escape_string($conn, $fullname);
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmail);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already registered!'); window.location='register.html';</script>";
        exit();
    }

    // Check if username already exists
    $checkUsername = "SELECT * FROM users WHERE username='$username'";
    $resultUser = mysqli_query($conn, $checkUsername);
    if (mysqli_num_rows($resultUser) > 0) {
        echo "<script>alert('Username already taken!'); window.location='register.html';</script>";
        exit();
    }

    // Generate verification code
    $verification_code = md5(uniqid(rand(), true));
    $status = 0;

    // Insert user into database
    $insert = "INSERT INTO users (fullname, username, email, password, verification_code, status) 
               VALUES ('$fullname', '$username', '$email', '$hashedPassword', '$verification_code', '$status')";

    if (mysqli_query($conn, $insert)) {
        header("Location: login.php");
        exit();
    } else {
        echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | WebDev Agency</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>

<body class="bg-light">
  <!-- Navbar -->
  <?php renderNavbar('register'); ?>

  <!-- Register Section -->
  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-5">
              <div class="text-center mb-4">
                <h2 class="fw-bold">Create an Account</h2>
                <p class="text-muted">Join our community and start your journey</p>
              </div>

             
              <!-- Register Form -->
              <form action="register.php" method="POST">
                <div class="row g-3">
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="fullName" name="fullname" placeholder="Full Name"
                        required>
                      <label for="fullName">Full Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="username" name="username"
                        placeholder="Choose Username" required>
                      <label for="username">Username</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        required>
                      <label for="email">Email Address</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                      <label for="password">Password</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                        placeholder="Confirm Password" required>
                      <label for="confirmPassword">Confirm Password</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="terms" required>
                      <label class="form-check-label text-muted" for="terms">
                        I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#"
                          class="text-primary">Privacy Policy</a>
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100 btn-lg">Create Account</button>
                  </div>
                </div>
              </form>


              <div class="text-center mt-4">
                <p class="mb-0 text-muted">Already have an account? <a href="login.html" class="text-primary">Login</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
 <?php renderFooter(); ?>

  <style>
    .divider {
      display: flex;
      align-items: center;
      text-align: center;
      color: #6c757d;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      border-bottom: 1px solid #dee2e6;
    }

    .divider-text {
      padding: 0 1rem;
    }
  </style>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>