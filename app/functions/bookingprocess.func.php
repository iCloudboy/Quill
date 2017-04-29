<?php
include '../db.conn.php';	// make db connection
session_start();

$description = filter_has_var(INPUT_POST, 'description') ? $_POST['description']: null;
$date = filter_has_var(INPUT_POST, 'date') ? $_POST['date']: null;
$time = filter_has_var(INPUT_POST, 'time') ? $_POST['time']: null;
$artistID = $_SESSION['artistID'];
$userID = $_SESSION['user'];
$time = date('H:i', strtotime($time));

$currentdate = date('Y-m-d');

if (isset($_POST['booking-submit'])){ //check if submit button was pressed
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //website secret key
        $secretkey = '6LdlDhwUAAAAAGHscAj6OQoWqZbgfeA3TEnOXnIW';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretkey . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            if (!empty($description)){
                if (strlen($description) <= 250) { //check that the description field is no more than 255 characters
                    if (!empty($date)){
                        if ($date > $currentdate) { //check if the booking date is in the future
                            if (!empty($date)){
                                try {
                                    $sql = "INSERT INTO booking(userID, artistID, bookingDate, bookingMessage, bookingTime) VALUES (?,?,?,?,?)";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("iisss", $userID, $artistID, $date, $description, $time);
                                    $stmt->execute();

                                    if ($stmt){
                                        echo 'added';
                                    } else {
                                        echo "didnt work";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            } else {
                                $_SESSION['booking_error'] = "Please select a time";
                                print_r($_SESSION['booking_error']);
                                //header("Refresh:3; url=../../login.php");
                                exit();
                            }
                        } else {
                            $_SESSION['booking_error'] = "Please select a booking date in the future.";
                            print_r($_SESSION['booking_error']);
                            //header("Refresh:3; url=../../login.php");
                            exit();
                        }
                    } else {
                        $_SESSION['booking_error'] = "Please select a date";
                        print_r($_SESSION['booking_error']);
                        //header("Refresh:3; url=../../login.php");
                        exit();
                    }
                } else {
                    $_SESSION['booking_error'] = "Tattoo description field must be no more than 250 characters. Please try again.";
                    print_r($_SESSION['booking_error']);
                    //header("Refresh:3; url=../../login.php");
                    exit();
                }
            } else {
                $_SESSION['booking_error'] = "Tattoo description field cannot be empty. Please try again.";
                print_r($_SESSION['booking_error']);
                //header("Refresh:3; url=../../login.php");
                exit();
            }
        } else {
            $_SESSION['booking_error'] = "verification failed. Please try again.";
            print_r($_SESSION['booking_error']);
            //header("Refresh:3; url=../../login.php");
            exit();
        }
    } else {
        $_SESSION['booking_error'] = "Please complete the Recaptcha.";
        print_r($_SESSION['booking_error']);
        //header("Refresh:3; url=../../login.php");
        exit();
    }
} else {
    $_SESSION['booking_error'] = "An error has occured. Please try again.";
    print_r($_SESSION['booking_error']);
    //header("Refresh:3; url=../../login.php");
    exit();
}

