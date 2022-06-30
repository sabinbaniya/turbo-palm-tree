<?php
require("../../../models/db/connectDB.php");

if (!isset($_POST["password"], $_POST["username"])) {
    // redirect if $_POST[passowrd is not set] i.e. directly accessing from url bar
    header("Location: ../../../public/index.php");
    exit();
}

session_start();

if ($stmt = $conn->prepare('SELECT username FROM admins')) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($username);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        if ($stmt = $conn->prepare('SELECT password FROM admins WHERE username = ? LIMIT 1')) {
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($password);
                $stmt->fetch();

                if (password_verify($_POST['password'], $password)) {
                    session_regenerate_id();
                    $_SESSION['admin_loggedin'] = TRUE;
                    $_SESSION['admin_username'] = $_POST['username'];

                    header("Location: ../../../public/admin/dashboard.php");
                } else {
                    header("Location: ../../../public/admin/login.php?success=false");
                }
            } else {
                header("Location: ../../../public/admin/login.php?success=false");
            }
            $stmt->close();
        }
    } else {
        $username = "root";
        $unhashedpw = "LR&*#jn(0987";
        $hashedpw = password_hash($unhashedpw, PASSWORD_DEFAULT);
        $email = "admin@website.com";
        $stmt = $conn->prepare("INSERT INTO admins (username,password,email) VALUES (?,?,?)");
        $stmt->bind_param("sss", $username, $hashedpw, $email);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            header("Location: ../../../public/admin/login.php?new_admin_created=true");
        } else {
            header("Location: ../../../public/admin/login.php?new_admin_created=false");
        }
    }
    $stmt->close();
}
