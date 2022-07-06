<?php
session_start();
if (!isset($_POST["name"], $_POST["email"], $_POST["birth-date"], $_POST["number"], $_POST["gender"], $_POST["username"])) {
    // redirect if directly accessing from url bar
    header("Location: ../../../public/index.php");
    exit();
}

require_once("../../../models/db/connectDB.php");

// check if a user is entering an already used email or username
if ($stmt = $conn->prepare("SELECT username, email FROM users WHERE NOT username = ? AND (username = ? OR email = ?) LIMIT 1")) {
    $stmt->bind_param("sss", $_SESSION["username"], $_POST["username"], $_POST["email"]);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($username, $email);
    $stmt->fetch();

    if ($_POST["username"] === $username && $_POST["email"] === $email) {
        header("Location: ../../../public/courses/settings.php?uname=invalid&email=invalid");
        exit();
    }

    if ($_POST["username"] === $username) {
        header("Location: ../../../public/courses/settings.php?uname=invalid");
        exit();
    }
    if ($_POST["email"] === $email) {
        header("Location: ../../../public/courses/settings.php?email=invalid");
        exit();
    }
}

try {
    $stmt = $conn->prepare("UPDATE users SET  name = ?,  email = ?,  mobile = ?,  date_of_birth = ?,  gender = ?, username = ? WHERE username = ?");
    $stmt->bind_param(
        "sssssss",
        $_POST["name"],
        $_POST["email"],
        $_POST["number"],
        $_POST["birth-date"],
        $_POST["gender"],
        $_POST["username"],
        $_SESSION["username"]
    );
    $stmt->execute();
} catch (\Throwable $th) {
    exit(header("Location: ../../../public/courses/settings.php?success=false"));
}
$_SESSION["username"] = $_POST["username"];
exit(header("Location: ../../../public/courses/settings.php?success=true"));
