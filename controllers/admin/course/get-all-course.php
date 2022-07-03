<?php

function get_all_course()
{
    require_once("../../models/db/connectDB.php");

    if ($stmt = $conn->prepare("SELECT course_id, course_name, course_title, course_price, course_credit_hours, course_description, course_curriculum_brief, course_aim, course_objectives, course_salient_features, course_entry_criteria, course_structure_downloadable, createdat, updatedat  FROM courses")) {
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return $stmt;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
