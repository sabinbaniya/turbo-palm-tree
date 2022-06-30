<?php

if (!isset($_POST["password"], $_POST["name"], $_POST["email"], $_POST["birth-date"], $_POST["number"], $_POST["gender"], $_POST["username"])) {
    // redirect if directly accessing from url bar
    header("Location: ../../../public/index.php");
    exit();
}

require_once("../../../models/db/connectDB.php");
session_start();


// check if a user is entering an already used email or username
if ($stmt = $conn->prepare("SELECT username, email FROM users WHERE username = ? OR email = ?")) {
    $stmt->bind_param("ss", $_POST["username"], $_POST["email"]);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($username, $email);
    $stmt->fetch();

    if ($_POST["username"] === $username && $_POST["email"] === $email) {
        // $location = str_replace("\\", "/", __DIR__) . "/signup.php?uname=invalid&email=invalid";
        header("Location: ../../../public/courses/signup.php?uname=invalid&email=invalid");
        exit();
    }

    if ($_POST["username"] === $username) {
        // $location = str_replace("\\", "/", __DIR__) . "/signup.php?uname=invalid";
        header("Location: ../../../public/courses/signup.php?uname=invalid");
        exit();
    }
    if ($_POST["email"] === $email) {
        // $location = str_replace("\\", "/", __DIR__) . "/signup.php?email=invalid";
        header("Location: ../../../public/courses/signup.php?email=invalid");
        exit();
    }
}

// create the user
if ($stmt = $conn->prepare('INSERT INTO users (name, email, mobile, password, date_of_birth, gender, username) VALUES (?,?,?,?,?,?,?)')) {
    $pw = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt->bind_param('sssssss', $_POST['name'], $_POST['email'], $_POST['number'], $pw, $_POST["birth-date"], $_POST["gender"], $_POST["username"]);
    $stmt->execute();
    echo $stmt->affected_rows;

    if ($stmt->affected_rows > 0) {
        // $location = str_replace("\\", "/", __DIR__) . "/courses/login.php?result=success";
        header("Location: ../../../public/courses/login.php?result=success");
        exit();
    } else {
        // $location = str_replace("\\", "/", __DIR__) . "/courses/signup.php?result=failure";
        header("Location: ../../../public/courses/signup.php?result=failure");
        exit();
    }
    $stmt->close();
    $conn->close();
}
