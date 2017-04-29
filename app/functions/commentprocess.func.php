<?php
require "../db.conn.php";
session_start();

$comment = filter_has_var(INPUT_POST, 'comment') ? $_POST['comment']: null;
$userID = $_SESSION['user'];
$tattooID = $_SESSION['tattooID'];
$date = date('Y-m-d');

if (isset($_POST['tattoo-submit'])) {  //check if submit button was pressed
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //website secret key
        $secretkey = '6LdlDhwUAAAAAGHscAj6OQoWqZbgfeA3TEnOXnIW';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretkey . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            if (!empty($comment)){
                if (strlen($comment) <= 250) { //check that the comment field is no more than 250 characters
                    try {
                        $sql = "INSERT INTO comments(userID, tattooID, comment, commentDate) VALUES (?,?,?,?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("iiss", $userID, $tattooID, $comment, $date);
                        $stmt->execute();

                        if ($stmt){
                            header("Location:../../tattoo.php");
                        } else {
                            echo "didnt work";
                        }



                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                } else {
                    $_SESSION['comment_error'] = "Comments must be no more than 250 characters. Please try again.";
                    print_r($_SESSION['upload_error']);
                    //header("Refresh:3; url=../../login.php");
                    exit();
                }

            } else {
                $_SESSION['upload_error'] = "Fields cannot be empty. Please try again.";
                print_r($_SESSION['upload_error']);
                //header("Refresh:3; url=../../login.php");
                exit();
            }
        } else {
            $_SESSION['comment_error'] = "verification failed. Please try again.";
            print_r($_SESSION['comment_error']);
            //header("Refresh:3; url=../../login.php");
            exit();
        }
    } else {
        $_SESSION['comment_error'] = "Please complete the Recaptcha.";
        print_r($_SESSION['comment_error']);
        //header("Refresh:3; url=../../login.php");
        exit();
    }
} else {
    $_SESSION['comment_error'] = "An error has occured. Please try again.";
    print_r($_SESSION['comment_error']);
    //header("Refresh:3; url=../../login.php");
    exit();
}
