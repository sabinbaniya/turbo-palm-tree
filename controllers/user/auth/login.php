<?php
require("../../../models/db/connectDB.php");

if (!isset($_POST["password"], $_POST["username"])) {
    // redirect if $_POST[passowrd is not set] i.e. directly accessing from url bar
    header("Location: ../../../public/index.php");
    exit();
}

session_start();

if ($stmt = $conn->prepare('SELECT password FROM users WHERE username = ? LIMIT 1')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($password);
        $stmt->fetch();

        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $_POST['username'];

            header("Location: ../../../public/courses/dashboard.php");
        } else {
            header("Location: ../../../public/courses/login.php?success=false");
        }
    } else {
        header("Location: ../../../public/courses/login.php?success=false");
    }
    $stmt->close();
}
