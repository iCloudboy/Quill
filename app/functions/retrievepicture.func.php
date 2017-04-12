<?php

function retrievePicture(){
    require "./app/db.conn.php";
    $userID = $_SESSION['user'];
    if ($stmt = $conn->prepare("SELECT picture FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($picture);

        if ($stmt->fetch()){
            return $picture;
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveForename(){
    require "./app/db.conn.php";
    $userID = $_SESSION['user'];
    if ($stmt = $conn->prepare("SELECT forename FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($forename);

        if ($stmt->fetch()){
            return $forename;
        }
    } else {
        echo 'SQL statement messed up';
    }
}

