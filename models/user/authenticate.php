<?php

if (!isset($_POST["password"])) {
    // redirect if $_POST[passowrd is not set] i.e. directly accessing from url bar
    header("Location: ../../public/index.php");
    exit();
}

if (isset($_POST["email"])) {
    // sign up stuff 

} else {
    //login stuff
}

// require_once("../db/connectDB.php");
// session_start();

// if ($stmt = $conn->prepare('SELECT id, password, role FROM users WHERE username = ?')) {
//     $stmt->bind_param('s', $_POST['username']);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows > 0) {
//         $stmt->bind_result($id, $password, $role);
//         $stmt->fetch();
//         if (password_verify($_POST['password'], $password)) {
//             session_regenerate_id();
//             $_SESSION['loggedin'] = TRUE;
//             $_SESSION["user_role"] = $role;
//             $_SESSION['name'] = $_POST['username'];
//             $_SESSION['id'] = $id;

//             header("Location: ./index.php");
//         } else {
//             header("Location: ../index.php");
//         }
//     } else {
//         header("Location: ../index.php");
//     }
//     $stmt->close();
// }
