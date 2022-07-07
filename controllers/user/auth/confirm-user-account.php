<?php

function confirm_user_account($code)
{
    require_once("../../models/db/connectDB.php");
    if ($stmt = $conn->prepare("SELECT email_verified FROM users WHERE email_confirmation_code = ? AND email_verified = ? LIMIT 1")) {
        $val = 0;
        $stmt->bind_param("ii", $code, $val);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($email_verified);
        $stmt->fetch();
        if ($stmt->num_rows === 0 || $email_verified) {
            return false;
        } else {
            $stmt = $conn->prepare("UPDATE users SET email_verified = ? WHERE email_confirmation_code = ? LIMIT 1");
            $val = 1;
            $stmt->bind_param("ii", $val, $code);
            $stmt->execute();
            if ($stmt->affected_rows === 1) {
                return true;
            } else {
                return false;
            }
        }
    } else {
        return false;
    }
}
