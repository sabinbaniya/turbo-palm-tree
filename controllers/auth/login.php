<?php

if (!isset($_POST["password"], $_POST["username"])) {
    // redirect if $_POST[passowrd is not set] i.e. directly accessing from url bar
    header("Location: ../../public/index.php");
    exit();
}
