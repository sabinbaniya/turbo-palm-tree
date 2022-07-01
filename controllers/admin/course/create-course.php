<?php

function create_course()
{
    require_once("../../models/db/connectDB.php");

    $downloadable = $_FILES['course_structure_downloadable']['name'];

    $tempname = $_FILES['course_structure_downloadable']['tmp_name'];

    $folder = "../assets/pdf/courses/" . $downloadable;

    move_uploaded_file($tempname, $folder);

    function random_str(
        $length,
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ) {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        if ($max < 1) {
            throw new Exception('$keyspace must be at least two characters long');
        }
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

    $c_id = random_int(0, 2312312432599);
    $c_price = intval($_POST["course_price"]);
    $c_hrs = intval($_POST["course_credit_hours"]);

    if ($stmt = $conn->prepare("INSERT INTO courses (course_id, course_name, course_price, course_title, course_credit_hours, course_description, course_curriculum_brief, course_aim, course_objectives, course_salient_features,course_entry_criteria, course_structure_downloadable) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)")) {
        $stmt->bind_param(
            "dsisisssssss",
            $c_id,
            $_POST["course_name"],
            $c_price,
            $_POST["course_title"],
            $c_hrs,
            $_POST["course_description"],
            $_POST["course_curriculum_brief"],
            $_POST["course_aim"],
            $_POST["course_objectives"],
            $_POST["course_salient_features"],
            $_POST["course_entry_criteria"],
            $folder
        );
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
