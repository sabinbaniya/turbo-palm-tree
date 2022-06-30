<?php

if (!isset($_SESSION["admin_username"])) {
    exit(header("location: ../../../public/index.php"));
}

function getAdminDetails()
{
    require_once("../../models/db/connectDB.php");

    if ($stmt = $conn->prepare("SELECT username, email FROM admins WHERE username = ?")) {
        $stmt->bind_param("s", $_SESSION["admin_username"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($username, $email);
        $stmt->fetch();
        $arr = array("username" => $username, "email" => $email);
        return $arr;
    } else {
        return null;
    }
}
