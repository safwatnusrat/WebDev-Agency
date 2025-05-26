<?php
function renderNavbar($activePage = '') {
    $isLoggedIn = isset($_SESSION['email']);
    $isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= $isLoggedIn ? 'home.php' : 'index.html' ?>">
            WebDev<span class="text-primary">Agency</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>" 
                       href="<?= $isLoggedIn ? 'home.php' : 'index.html' ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'about' ? 'active' : '' ?>" 
                       href="about us.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'services' ? 'active' : '' ?>" 
                       href="service.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'portfolio' ? 'active' : '' ?>" 
                       href="portfolio.html">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'contact' ? 'active' : '' ?>" 
                       href="contact.html">Contact</a>
                </li>
                <?php if ($isAdmin): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'dashboard' ? 'active' : '' ?>" 
                           href="dashboard.php">Dashboard</a>
                    </li>
                <?php endif; ?>
                <?php if (!$isLoggedIn): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'register' ? 'active' : '' ?>" 
                           href="register.html">Register</a>
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
