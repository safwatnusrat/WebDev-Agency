<?php
function renderFooter() {
?>
<footer class="py-4 bg-dark text-white mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="mb-3">WebDevAgency</h5>
                <p class="text-muted">Creating digital experiences that matter.</p>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="<?= isset($_SESSION['email']) ? 'home.php' : 'index.html' ?>" class="text-white">Home</a></li>
                    <li><a href="about us.php" class="text-white">About Us</a></li>
                    <li><a href="service.php" class="text-white">Services</a></li>
                    <li><a href="contact.php" class="text-white">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Follow Us</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white text-decoration-none"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-white text-decoration-none"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="text-white text-decoration-none"><i class="bi bi-linkedin fs-5"></i></a>
                    <a href="#" class="text-white text-decoration-none"><i class="bi bi-instagram fs-5"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-secondary my-4">
        <div class="text-center">
            <p class="mb-0">&copy; 2025 WebDevAgency. All rights reserved.</p>
        </div>
    </div>
</footer>
<?php
}
?>
