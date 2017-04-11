<?php

if (isset($_SESSION['user'])) {
    $userID = $_SESSION['user'];
    if ($stmt = $conn->prepare("SELECT email, location, studio, role, about FROM users WHERE userID = ?")) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->bind_result($email, $location, $studio, $role, $about);

    }
} else {
    $_SESSION['userpull_error'] = "You are not logged in. Please log in first.";
    print_r($_SESSION['settings_error']);
    //header("Refresh:3; url=../../settings.php");
    exit();
}

