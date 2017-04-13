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
            $stmt->close();
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
            $stmt->close();
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveSurname(){
    require "./app/db.conn.php";
    $userID = $_SESSION['user'];
    if ($stmt = $conn->prepare("SELECT surname FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($surname);

        if ($stmt->fetch()){
            return $surname;
            $stmt->close();
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveRole(){
    require "./app/db.conn.php";
    $userID = $_SESSION['user'];
    if ($stmt = $conn->prepare("SELECT role FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($role);

        if ($stmt->fetch()){
            return $role;
            $stmt->close();
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveStudio(){
    require "./app/db.conn.php";
    $userID = $_SESSION['user'];
    if ($stmt = $conn->prepare("SELECT studio FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($studio);

        if ($stmt->fetch()){
            return $studio;
            $stmt->close();
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveLocation(){
    require "./app/db.conn.php";
    $userID = $_SESSION['user'];
    if ($stmt = $conn->prepare("SELECT location FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($location);

        if ($stmt->fetch()){
            return $location;
            $stmt->close();
        }
    } else {
        echo 'SQL statement messed up';
    }
}
function retrieveAbout(){
    require "./app/db.conn.php";
    $userID = $_SESSION['user'];
    if ($stmt = $conn->prepare("SELECT about FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($about);

        if ($stmt->fetch()){
            return $about;
            $stmt->close();
        }
    } else {
        echo 'SQL statement messed up';
    }
}
