<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pixel_it";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    header("Location: ../../public/error.php");
    die("Connection failed" . $conn->connect_error);
}
