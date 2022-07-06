<?php

function get_enrolled_courses()
{
    require("../../models/db/connectDB.php");
    $u_id = intval($_SESSION["id"]);
    if ($stmt = $conn->prepare("SELECT course_id FROM enrollments WHERE user_id = ?")) {
        $stmt->bind_param("i", $u_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($course_id);
        $arr = array();
        while ($stmt->fetch()) {
            array_push($arr, $course_id);
        }
        return $arr;
    } else {
        return null;
    }
}
