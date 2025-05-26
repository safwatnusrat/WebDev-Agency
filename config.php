<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "web_dev2";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
