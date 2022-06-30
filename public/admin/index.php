<?php
session_start();
if (isset($_SESSION["admin_loggedin"])) {
    header("location: ./dashboard.php");
} else {
    header("location: ../index.php");
}
exit();
