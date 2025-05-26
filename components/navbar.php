<?php
function renderNavbar($activePage = '') {
    $isLoggedIn = isset($_SESSION['email']);
   
?>
<!-- Add theme assets -->
<script src="/frontend_design/js/theme.js" defer></script>
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= $isLoggedIn ? 'home.php' : 'index.php' ?>">
            WebDev<span class="text-primary">Agency</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <!-- Theme Toggle Button -->
                <li class="nav-item me-3">
                    <button class="btn btn-link nav-link p-0 d-flex align-items-center" onclick="setTheme(document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark')">
                        <i class="bi bi-sun-fill theme-toggle-icon"></i>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>" 
                       href="<?= $isLoggedIn ? 'home.php' : 'index.php' ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'about' ? 'active' : '' ?>" 
                       href="about us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'services' ? 'active' : '' ?>" 
                       href="service.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'portfolio' ? 'active' : '' ?>" 
                       href="portfolio.php">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'contact' ? 'active' : '' ?>" 
                       href="contact.php">Contact</a>
                </li>
                
                <?php if (isset($_SESSION['email']) && $_SESSION['email'] === 'admin@gmail.com'): ?>
                   
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'dashboard' ? 'active' : '' ?>" 
                           href="dashboard.php">Dashboard</a>
                    </li>
                <?php endif; ?>
                <?php if (!$isLoggedIn): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'register' ? 'active' : '' ?>" 
                           href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'login' ? 'active' : '' ?>" 
                           href="login.php">Login</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php
}
?>
