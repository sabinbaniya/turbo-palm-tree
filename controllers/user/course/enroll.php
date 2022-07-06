<?php

function enroll_course($course_id)
{
    require("../../models/db/connectDB.php");


    $user_id = intval($_SESSION["id"]);
    if ($stmt = $conn->prepare("SELECT * from enrollments WHERE course_id = ? AND user_id = ? LIMIT 1")) {
        $stmt->bind_param("ii", $course_id, $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->fetch();
        if ($stmt->num_rows === 0) {
            $stmt = $conn->prepare("INSERT INTO enrollments (course_id, user_id) VALUES (?,?)");
            $stmt->bind_param("ii", $course_id, $user_id);
            $stmt->execute();
            return $stmt->affected_rows;
        }
    } else {
        return null;
    }
}
