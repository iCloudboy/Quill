<?php
function userType($userID){
    require "./app/db.conn.php";

    $sql = "SELECT userType FROM users WHERE userID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $stmt->bind_result($userType);

    if ($stmt->fetch()){
        if ($userType == 2) {
            return true;
        } else{
            return false;
        }
    } else {
        return "fucked";
    }

}
