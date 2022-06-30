<?php

if (!isset($_SESSION["admin_username"])) {
    exit(header("location: ../../../public/index.php"));
}

function editAdminDetails()
{
    require_once("../../models/db/connectDB.php");

    if ($stmt = $conn->prepare("UPDATE admins SET username=?, email=? WHERE username = ?")) {
        $stmt->bind_param("sss", $_POST["uname"], $_POST["email"], $_SESSION["admin_username"]);
        $stmt->execute();
        if ($stmt->affected_rows === 1) {
            $_SESSION["admin_username"] = $_POST["uname"];
            return true;
        }
        return false;
    } else {
        return false;
    }
}
