<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and collect POST data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check password confirmation
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.location='register.html';</script>";
        exit();
    }

    // Hash password securely
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

    // Insert into database
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
