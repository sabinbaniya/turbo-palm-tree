<?php

if (!isset($_POST["password"], $_POST["name"], $_POST["email"], $_POST["birth-date"], $_POST["number"], $_POST["gender"], $_POST["username"])) {
    // redirect if directly accessing from url bar
    header("Location: ../../../public/index.php");
    exit();
}

require_once("../../../models/db/connectDB.php");
session_start();


// check if a user is entering an already used email or username
if ($stmt = $conn->prepare("SELECT username, email FROM users WHERE username = ? OR email = ? LIMIT 1")) {
    $stmt->bind_param("ss", $_POST["username"], $_POST["email"]);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($username, $email);
    $stmt->fetch();

    if ($_POST["username"] === $username && $_POST["email"] === $email) {
        header("Location: ../../../public/courses/signup.php?uname=invalid&email=invalid");
        exit();
    }

    if ($_POST["username"] === $username) {
        header("Location: ../../../public/courses/signup.php?uname=invalid");
        exit();
    }
    if ($_POST["email"] === $email) {
        header("Location: ../../../public/courses/signup.php?email=invalid");
        exit();
    }
}

// create the user
if ($stmt = $conn->prepare('INSERT INTO users (name, email, mobile, password, date_of_birth, gender, username, email_confirmation_code) VALUES (?,?,?,?,?,?,?,?)')) {
    $pw = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email_c_code = random_int(0, 2312312432599);
    $stmt->bind_param('sssssssi', $_POST['name'], $_POST['email'], $_POST['number'], $pw, $_POST["birth-date"], $_POST["gender"], $_POST["username"], $email_c_code);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        require_once("../../../public/helpers/send_email.php");
        $res = send_confirmation_email($_POST["name"], $_POST["email"], $_POST["username"], $email_c_code);
        if ($res) {
            header("Location: ../../../public/courses/login.php?result=success&confirmationemailsent=true");
        } else {
            header("Location: ../../../public/courses/login.php?result=success&confirmationemailsent=false");
        }
        exit();
    } else {
        header("Location: ../../../public/courses/signup.php?result=failure");
        exit();
    }
    $stmt->close();
    $conn->close();
}
