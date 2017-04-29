<?php
require "../db.conn.pdo.php";
session_start();

$title = filter_has_var(INPUT_POST, 'title') ? $_POST['title']: null;
$description = filter_has_var(INPUT_POST, 'description') ? $_POST['description']: null;
$tags = filter_has_var(INPUT_POST, 'tags') ? $_POST['tags']: null;
$date = date('Y/m/d');
$tattooID = $_SESSION['tattooID'];
$views = 1;
$shares = 1;
$likes = 1;

if (isset($_POST['upload-submit'])) {  //check if submit button was pressed
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //website secret key
        $secretkey = '6LdlDhwUAAAAAGHscAj6OQoWqZbgfeA3TEnOXnIW';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretkey . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            if (!empty($title) && !empty($description) && !empty($tags)){
                if (strlen($title) <= 40) { //check that the title field is no more than 40 characters
                    if (strlen($description) <= 255) { //check that the description field is no more than 255 characters
                        if (strlen($tags) <= 250) { //check that the tags field is no more than 250 characters

                            try {
                                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
                                $sql = "UPDATE tattoos SET tattooName = ?, tattooDescription = ?, tattooTags = ?, tattooDate = ?, tattooViews = ?, tattooLikes = ?, tattooShares = ? WHERE tattooID = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(1, $title, PDO::PARAM_STR);
                                $stmt->bindParam(2, $description, PDO::PARAM_STR);
                                $stmt->bindParam(3, $tags, PDO::PARAM_STR);
                                $stmt->bindParam(4, $date, PDO::PARAM_STR);
                                $stmt->bindParam(5, $views, PDO::PARAM_STR);
                                $stmt->bindParam(6, $likes, PDO::PARAM_STR);
                                $stmt->bindParam(7, $shares, PDO::PARAM_INT);
                                $stmt->bindParam(8, $tattooID, PDO::PARAM_INT);
                                $stmt->execute();

                                if ($stmt){

                                    $_SESSION['upload_success'] = 'tattoo successfully uploaded';
                                    print_r($_SESSION['upload_success']);
                                    header('Refresh:3; url=../../tattoo.php?tattooID=' .  $tattooID . '');
                                    exit();
                                } else {
                                    $_SESSION['upload_error'] = "Tattoo failed to upload.";
                                    print_r($_SESSION['upload_error']);
                                    //header("Refresh:3; url=../../login.php");
                                    exit();
                                }

                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        } else{
                            $_SESSION['upload_error'] = "tags must be no more than 250 characters. Please try again.";
                            print_r($_SESSION['upload_error']);
                            //header("Refresh:3; url=../../login.php");
                            exit();
                        }
                    } else {
                        $_SESSION['upload_error'] = "Description must be no more than 255 characters. Please try again.";
                        print_r($_SESSION['upload_error']);
                        //header("Refresh:3; url=../../login.php");
                        exit();
                    }
                } else {
                    $_SESSION['upload_error'] = "Title must be no more than 40 characters. Please try again.";
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
        } else{
            $_SESSION['upload_error'] = "Recaptcha failed. Please try again.";
            print_r($_SESSION['upload_error']);
            //header("Refresh:3; url=../../login.php");
            exit();
        }
    } else {
        $_SESSION['upload_error'] = "Please complete the Recaptcha.";
        print_r($_SESSION['upload_error']);
        //header("Refresh:3; url=../../login.php");
        exit();
    }
} else {
    $_SESSION['upload_error'] = "An error has occured. Please try again.";
    print_r($_SESSION['upload_error']);
    //header("Refresh:3; url=../../login.php");
    exit();
}
