<?php

$username = "root";
$password = "";
$database = "pixel_it_courses";
$url = "localhost";

$conn = new mysqli($url, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
