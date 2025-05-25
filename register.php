<?php
require 'config.php';

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
