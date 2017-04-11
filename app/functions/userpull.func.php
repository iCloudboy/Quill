<?php
include '../db.conn.php';	// make db connection
session_start();

if (isset($_SESSION['user'])) {
    $userID = $_SESSION['user'];
    if ($stmt = $mysqli->prepare("SELECT email, password, location, studio, role, about FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($email, $password, );

    }
} else {
    $_SESSION['userpull_error'] = "You are not logged in. Please log in first.";
    print_r($_SESSION['settings_error']);
    //header("Refresh:3; url=../../settings.php");
    exit();
}

