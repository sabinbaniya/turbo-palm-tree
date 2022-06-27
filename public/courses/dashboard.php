<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ./login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body>
    Welcome to dashboard of courses

    <button>
        <a href="./logout.php">Log out</a>

    </button>

</body>

</html>