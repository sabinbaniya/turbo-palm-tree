<?php

function enroll_course($course_id)
{
    require("../../models/db/connectDB.php");

    $user_id = intval($_SESSION["id"]);
    if ($stmt = $conn->prepare("SELECT * FROM courses WHERE course_id = ? AND course_price = ? LIMIT 1")) {
        $course_price = 0;
        $stmt->bind_param("ii", $course_id, $course_price);
        $stmt->execute();
        $stmt->store_result();
        $stmt->fetch();

        if ($stmt->num_rows !== 0) {
            return "bad-request";
        }
    }
    if ($stmt = $conn->prepare("SELECT * from enrollments WHERE course_id = ? AND user_id = ? LIMIT 1")) {
        $stmt->bind_param("ii", $course_id, $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->fetch();
        if ($stmt->num_rows === 0) {
            $stmt = $conn->prepare("INSERT INTO enrollments (course_id, user_id) VALUES (?,?)");
            $stmt->bind_param("ii", $course_id, $user_id);
            $stmt->execute();
            if ($stmt = $conn->prepare("UPDATE courses SET enrollment_count = enrollment_count + 1 WHERE course_id = ? LIMIT 1")) {
                $stmt->bind_param("i", $course_id);
                $stmt->execute();
            }
            if ($stmt = $conn->prepare("UPDATE users SET courses_enrolled = courses_enrolled + 1 WHERE id = ? LIMIT 1")) {
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
            }
            return $stmt->affected_rows;
        }
    } else {
        return null;
    }
}
