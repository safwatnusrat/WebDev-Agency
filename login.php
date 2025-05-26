<?php
session_start(); // Important: Start session before anything else
require 'config.php';
require_once 'components/navbar.php';
require_once 'components/footer.php';

$login_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

     if ($email === 'admin@gmail.com' && $password === 'admin') {
        $_SESSION['role'] = 'admin';
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit();
    }

    // Get user by email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            // Set session and redirect
            $_SESSION['email'] = $email;
            header("Location: home.php");
            exit();
        } else {
            $login_message = "<div class='alert alert-danger'>Invalid email or password!</div>";
        }
    } else {
        $login_message = "<div class='alert alert-danger'>Invalid email or password!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | WebDev Agency</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>

  <?php renderNavbar('login'); ?>

  <!-- Login Section -->
  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-5">
              <div class="text-center mb-4">
                <h2 class="fw-bold">Welcome Back</h2>
                <p class="text-muted">Log in to your account to continue</p>
                
                <!-- Show Login Success/Error Message -->
                <?php if (!empty($login_message)) echo $login_message; ?>
              </div>

              <!-- Login Form -->
              <form action="login.php" method="POST">
                <div class="row g-3">
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                      <label for="email">Email Address</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                      <label for="password">Password</label>
                    </div>
                  </div>
                  <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label text-muted" for="rememberMe">
                        Remember me
                      </label>
                    </div>
                    <a href="#" class="text-primary text-decoration-none">Forgot password?</a>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100 btn-lg">Log In</button>
                  </div>
                </div>
              </form>

              <div class="text-center mt-4">
                <p class="mb-0 text-muted">Don't have an account? <a href="register.html" class="text-primary">Register</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php renderFooter(); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
