<?php

if (!isset($_SESSION["username"])) {
    exit(header("location: ../../../public/index.php"));
}

function getUserDetails()
{
    require_once("../../models/db/connectDB.php");

    if ($stmt = $conn->prepare("SELECT name, email, mobile, date_of_birth, gender FROM users WHERE username = ?")) {
        $stmt->bind_param("s", $_SESSION["username"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($name, $email, $mobile, $date_of_birth, $gender);
        $stmt->fetch();
        $arr = array("name" => $name, "email" => $email, "mobile" => $mobile, "dob" => $date_of_birth, "gender" => $gender);
        return $arr;
    } else {
        return null;
    }
}
