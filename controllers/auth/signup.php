<?php

if (!isset($_POST["password"], $_POST["name"], $_POST["email"], $_POST["birth-date"], $_POST["number"], $_POST["gender"], $_POST["username"])) {
    // redirect if directly accessing from url bar
    header("Location: ../../public/index.php");
    exit();
}
