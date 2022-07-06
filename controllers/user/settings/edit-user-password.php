<?php


function editAdminPassword()
{
    require_once("../../models/db/connectDB.php");

    if ($_POST["new_pass"] !== $_POST["re_pass"]) {
        return false;
    }

    if ($stmt = $conn->prepare("SELECT password FROM users WHERE username = ?")) {
        $stmt->bind_param("s", $_SESSION["username"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($password);
        $stmt->fetch();

        if (password_verify($_POST["curr_pass"], $password)) {
            if ($stmt = $conn->prepare("UPDATE users SET password=? WHERE username = ?")) {
                $hashedpw = password_hash($_POST["new_pass"], PASSWORD_DEFAULT);
                $stmt->bind_param("ss", $hashedpw, $_SESSION["username"]);
                $stmt->execute();
                if ($stmt->affected_rows === 1) {
                    return true;
                }
                return false;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}
