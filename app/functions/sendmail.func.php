<?php

    function email($to, $subject, $body){
        mail($to, $subject, $body, 'From: hello@quill.com');
    }

    function activate($email, $email_code)
    {
        require "app/db.conn.php";
        $email = mysqli_real_escape_string($conn, $email);
        $email_code = mysqli_real_escape_string($conn, $email_code);

        $stmt = $conn->prepare("SELECT userID FROM users WHERE email = ? AND emailCode = ? AND active = 0"); //select userid from the users table where the email and email code match the ones passed in the argument, and where the active field is set to 0
        $stmt->bind_param("ss", $email, $email_code);
        $stmt->execute();
        $stmt->bind_result($userID);

        if ($stmt->fetch()) {
            $stmt->close();
            $stmt2 = $conn->prepare("UPDATE users SET active = '1' WHERE email = ?");
            $stmt2->bind_param("s", $email);
            $stmt2->execute();
            if ($stmt2->fetch()){
                return true;
            } else {
                $what = 20;
                return $what;
            }

            $stmt2->close();
        } else {
            return false;
            $stmt2->close();
        }
    }
