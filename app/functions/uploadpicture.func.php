<?php

function change_profile_image($user_id, $file_temp, $file_extension){
    require "./app/db.conn.php";
    $file_path = './resources/images/picture/' . substr(md5(time()), 0, 10) . '.' . $file_extension; //generates a 10 character md5 hash from current time and uses it to name the picture.
    move_uploaded_file($file_temp, $file_path); //move the temporary file to the file path generated in $file_path

    try {
        $sql = "UPDATE `users` SET `picture` = ? WHERE userID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $file_path, $user_id);
        $stmt->execute();

        header("Location: settings.php");
    } catch (PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
}

function upload_tattoo_image($user_id, $file_temp, $file_extension){
    require "./app/db.conn.php";
    $file_path = './resources/images/tattoo/' . substr(md5(time()), 0, 10) . '.' . $file_extension; //generates a 10 character md5 hash from current time and uses it to name the picture.
    move_uploaded_file($file_temp, $file_path); //move the temporary file to the file path generated in $file_path

    try {
        $sql = "INSERT INTO tattoos(tattooImage, userID) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $file_path, $user_id);
        $stmt->execute();

        if($stmt){
            $stmt->close();
            $sql2 = "SELECT tattooID FROM tattoos WHERE userID = ? AND tattooImage = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("is", $user_id, $file_path);
            $stmt2->execute();
            $stmt2->bind_result($tattooID);

            if ($stmt2->fetch()){
                unset($_SESSION['tattooID']);
                $_SESSION['tattooID'] = $tattooID;
            } else {
                echo 'didnt work';
            }


        } else {
            echo "Tattoo upload failed";
        }

        //header("Location: designupload.php");
    } catch (PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
}
