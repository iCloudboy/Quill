<?php

function change_profile_image($user_id, $file_temp, $file_extension){
    require "./app/db.conn.php";
    $file_path = 'var/www/html/website/resources/images/picture/' . substr(md5(time()), 0, 10) . '.' . $file_extension; //generates a 10 character md5 hash from current time and uses it to name the picture.
    move_uploaded_file($file_temp, $file_path); //move the temporary file to the file path generated in $file_path

    try {
        $sql = "UPDATE `users` SET `picture` = ? WHERE userID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $file_path, $user_id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
}
