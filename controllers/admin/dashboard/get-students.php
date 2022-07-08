<?php

function get_student_count()
{
    require("../../models/db/connectDB.php");
    if ($stmt = $conn->prepare("SELECT * FROM users")) {
        $stmt->execute();
        $stmt->store_result();
        return $stmt->affected_rows;
    } else {
        return null;
    }
}
