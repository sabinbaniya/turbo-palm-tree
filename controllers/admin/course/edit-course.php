<?php

function get_course_details($id)
{
    require_once("../../models/db/connectDB.php");
    if ($stmt = $conn->prepare("SELECT course_title, course_price, course_description, course_curriculum_brief, course_aim, course_objectives, course_salient_features, course_entry_criteria, course_structure_downloadable, course_structure_details ,course_url FROM courses WHERE course_id = ?")) {
        $stmt->bind_param("d", $id);
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

function edit_course_details($course_id)
{
    $course_price = intval($_POST["course_price"]);

    require_once("../../models/db/connectDB.php");

    if ($stmt = $conn->prepare("SELECT course_structure_downloadable FROM courses WHERE course_id = ?")) {

        if (isset($_POST["course_structure_downloadable"])) {
            try {
                $stmt = $conn->prepare("UPDATE courses SET course_title = ?, 
                course_price = ?, 
                course_description = ?, 
                course_curriculum_brief = ?, 
                course_aim = ?,
                course_objectives = ?,
                course_salient_features = ?,
                course_entry_criteria = ?,
                course_structure_details = ?,
                course_structure_downloadable = ?
                WHERE course_id = ?
                ");
                $stmt->bind_param(
                    "sissssssssi",
                    $_POST["course_title"],
                    $course_price,
                    $_POST["course_description"],
                    $_POST["course_curriculum_brief"],
                    $_POST["course_aim"],
                    $_POST["course_objectives"],
                    $_POST["course_salient_features"],
                    $_POST["course_entry_criteria"],
                    $_POST["course_structure_details"],
                    $_POST["course_structure_downloadable"],
                    $course_id
                );
                $stmt->execute();
            } catch (\Throwable $th) {
                return $th;
                return null;
            }
            return $stmt->affected_rows;
        } else {
            try {
                $stmt = $conn->prepare("UPDATE courses SET course_title = ?, 
                course_price = ?, 
                course_description = ?, 
                course_curriculum_brief = ?, 
                course_aim = ?,
                course_objectives = ?,
                course_salient_features = ?,
                course_entry_criteria = ?,
                course_structure_details = ?
                WHERE course_id = ?
                ");
                $stmt->bind_param(
                    "sisssssssi",
                    $_POST["course_title"],
                    $course_price,
                    $_POST["course_description"],
                    $_POST["course_curriculum_brief"],
                    $_POST["course_aim"],
                    $_POST["course_objectives"],
                    $_POST["course_salient_features"],
                    $_POST["course_entry_criteria"],
                    $_POST["course_structure_details"],
                    $course_id
                );
                $stmt->execute();
            } catch (\Throwable $th) {
                return $th;
                return null;
            }
            return $stmt->affected_rows;
        }
    }
}
