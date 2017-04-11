<?php

include '../db.conn.php';	// make db connection
session_start();

$email = filter_has_var(INPUT_POST, 'email') ? $_POST['email'] : null;
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;
$location = filter_has_var(INPUT_POST, 'location') ? $_POST['location'] : null;
$studio = filter_has_var(INPUT_POST, 'studio') ? $_POST['studio'] : null;
$role= filter_has_var(INPUT_POST, 'role') ? $_POST['role'] : null;
$about = filter_has_var(INPUT_POST, 'about') ? $_POST['about'] : null;

if (issset($_POST['settings-submit'])){
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //website secret key
        $secretkey = '6LdlDhwUAAAAAGHscAj6OQoWqZbgfeA3TEnOXnIW';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretkey . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
    } else {
        $_SESSION['settings_error'] = "Please click on the reCAPTCHA box";
        print_r($_SESSION['settings_error']);
        //header("Refresh:3; url=../../settings.php");
        exit();
    }

} else {
    $_SESSION['settings_error'] = "Something went wrong. Please try again.";
    print_r($_SESSION['settings_error']);
    //header("Refresh:3; url=../../settings.php");
    exit();
}
