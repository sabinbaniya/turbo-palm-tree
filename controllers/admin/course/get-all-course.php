<?php

function get_all_course($fromIndex = false)
{
    if ($fromIndex) {
        require("../models/db/connectDB.php");
    } else {
        require("../../models/db/connectDB.php");
    }

    if ($stmt = $conn->prepare("SELECT course_id, course_name, course_title, course_price, course_description, course_curriculum_brief, course_aim, course_objectives, course_salient_features, course_entry_criteria, course_structure_downloadable, course_url, enrollment_count ,createdat, updatedat  FROM courses")) {
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
