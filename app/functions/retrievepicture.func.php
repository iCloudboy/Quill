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
function retrieveArtistPicture($tattooID){

    require "./app/db.conn.php";

    $sql = "SELECT picture FROM users u
            INNER JOIN tattoos t
            ON u.userID = t.userID
            WHERE t.tattooID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tattooID);
    $stmt->execute();
    $stmt->bind_result($picture);

        if ($stmt->fetch()){
            return $picture;
            $stmt->close();
        } else {
            return false;
        }
}

function retrieveBookingPicture($artistID){

    require "./app/db.conn.php";

    $sql = "SELECT picture FROM users u
            WHERE userID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $artistID);
    $stmt->execute();
    $stmt->bind_result($picture);

    if ($stmt->fetch()){
        return $picture;
        $stmt->close();
    } else {
        return false;
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

function retrieveTattooImage($tattooID){
    require "./app/db.conn.php";
    if ($stmt = $conn->prepare("SELECT tattooImage FROM tattoos WHERE tattooID = ?")) {
        $stmt->bind_param("s", $tattooID);
        $stmt->execute();
        $stmt->bind_result($tattooImage);

        if ($stmt->fetch()){
            return $tattooImage;
            $stmt->close();
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveArtistForename(){
    require "./app/db.conn.php";
    $tattooID = $_SESSION['tattooID'];
    $sql = "SELECT forename FROM users u
            INNER JOIN tattoos t
            ON u.userID = t.userID
            WHERE tattooID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tattooID);
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

function retrieveArtistSurname(){
    require "./app/db.conn.php";
    $tattooID = $_SESSION['tattooID'];
    $sql = "SELECT surname FROM users u
            INNER JOIN tattoos t
            ON u.userID = t.userID
            WHERE tattooID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tattooID);
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

function retrieveTattooTitle(){
    require "./app/db.conn.php";
    $tattooID = $_SESSION['tattooID'];
    $sql = "SELECT tattooName FROM tattoos WHERE tattooID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $tattooID);
        $stmt->execute();
        $stmt->bind_result($title);

        if ($stmt->fetch()){
            return $title;
            $stmt->close();
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveTattooDate(){
    require "./app/db.conn.php";
    $tattooID = $_SESSION['tattooID'];
    $sql = "SELECT tattooDate FROM tattoos WHERE tattooID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tattooID);
        $stmt->execute();
        $stmt->bind_result($date);

        if ($stmt->fetch()){
            $formatteddate = date("jS F Y", strtotime($date));
            return $formatteddate;
            $stmt->close();
        } else {
            echo "failed";
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveTattooViews(){
    require "./app/db.conn.php";
    $tattooID = $_SESSION['tattooID'];
    $sql = "SELECT tattooViews FROM tattoos WHERE tattooID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tattooID);
        $stmt->execute();
        $stmt->bind_result($views);

        if ($stmt->fetch()){
            return $views;
            $stmt->close();
        } else {
            echo "failed";
        }
    } else {
        echo 'SQL statement messed up';
    }
}
function retrieveTattooLikes(){
    require "./app/db.conn.php";
    $tattooID = $_SESSION['tattooID'];
    $sql = "SELECT tattooLikes FROM tattoos WHERE tattooID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tattooID);
        $stmt->execute();
        $stmt->bind_result($likes);

        if ($stmt->fetch()){
            return $likes;
            $stmt->close();
        } else {
            echo "failed";
        }
    } else {
        echo 'SQL statement messed up';
    }
}
function retrieveTattooShares(){
    require "./app/db.conn.php";
    $tattooID = $_SESSION['tattooID'];
    $sql = "SELECT tattooShares FROM tattoos WHERE tattooID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tattooID);
        $stmt->execute();
        $stmt->bind_result($shares);

        if ($stmt->fetch()){
            return $shares;
            $stmt->close();
        } else {
            echo "failed";
        }
    } else {
        echo 'SQL statement messed up';
    }
}

function retrieveBookingForename($artistID){
    require "./app/db.conn.php";
    $artistID = $artistID;
    $sql = "SELECT forename FROM users
            WHERE userID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $artistID);
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

function retrieveBookingSurname($artistID){
    require "./app/db.conn.php";
    $artistID = $artistID;
    $sql = "SELECT surname FROM users
            WHERE userID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $artistID);
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

function retrieveBookingLocation($artistID){
    require "./app/db.conn.php";
    $artistID = $artistID;
    if ($stmt = $conn->prepare("SELECT location FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $artistID);
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

function retrieveBookingRole($artistID){
    require "./app/db.conn.php";
    $artistID = $artistID;
    if ($stmt = $conn->prepare("SELECT role FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $artistID);
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

function retrieveBookingStudio($artistID){
    require "./app/db.conn.php";
    $artistID = $artistID;
    if ($stmt = $conn->prepare("SELECT studio FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $artistID);
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


