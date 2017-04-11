<?php

include '../db.conn.php';	// make db connection
session_start();

$userID = $_SESSION['user'];
$email = filter_has_var(INPUT_POST, 'email') ? $_POST['email'] : null;
$newPassword = filter_has_var(INPUT_POST, 'newpassword') ? $_POST['newpassword'] : null;
$newPasswordConfirm = filter_has_var(INPUT_POST, 'newpasswordconfirm') ? $_POST['newpasswordconfirm'] : null;
$location = filter_has_var(INPUT_POST, 'location') ? $_POST['location'] : null;
$studio = filter_has_var(INPUT_POST, 'studio') ? $_POST['studio'] : null;
$role= filter_has_var(INPUT_POST, 'role') ? $_POST['role'] : null;
$about = filter_has_var(INPUT_POST, 'about') ? $_POST['about'] : null;
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;

if (isset($_POST['settings-submit'])){
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //website secret key
        $secretkey = '6LdlDhwUAAAAAGHscAj6OQoWqZbgfeA3TEnOXnIW';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretkey . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success) {
            if(!empty($email) && !empty($password)){
                //string length and character checks.
                //if (preg_match("/^[a-zA-Z' -]+$/", $location)) {
                    if (strlen($location) <= 50) {
                        //if (preg_match("/^[a-zA-Z' -]+$/", $studio)) {
                            if (strlen($studio) <= 50) {
                                //if (preg_match("/^[a-zA-Z' -]+$/", $role)) {
                                    if (strlen($role) <= 50) {
                                        //if (preg_match("/^[a-zA-Z' `-]+$/", $about)) {
                                            if (strlen($role) <= 255) {
                                                if ($newPassword === $newPasswordConfirm) { //check if new passwords match
                                                    try {
                                                        $stmt = $conn->prepare('SELECT password FROM users WHERE userID = ?');
                                                        $stmt->bind_param("s", $userID);
                                                        $stmt->execute();
                                                        $stmt->bind_result($dbPasswordHashed);
                                                    } catch (PDOException $e) {
                                                        echo "Error: " . $e->getMessage();
                                                    }
                                                    if ($stmt->fetch()) {
                                                        //hash the entered password and check if it matches the hashed password in the database.
                                                        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                                                        echo $dbPasswordHashed;
                                                        echo $passwordHashed;
//                                                        if ($passwordHashed === $dbPasswordHashed) {
//                                                            $stmt->close();
//                                                            if (!empty($newPassword)){ //if the user has entered a new password, update it along with the rest of the form.
//                                                                $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);
//                                                                try {
//                                                                    $stmt2 = $conn->prepare("UPDATE users
//                                                                                            SET email = ?, password = ?, location = ?, studio = ?, role = ?, about = ?
//                                                                                            WHERE userID = ?");
//                                                                    $stmt2->bind_param('ssssssi', $email, $newPasswordHashed, $location, $studio, $role, $about, $userID);
//                                                                    $stmt2->execute();
//                                                                } catch (PDOException $e) {
//                                                                    echo "Error: " . $e->getMessage();
//                                                                }
//                                                            } else {
//                                                                try {
//                                                                    $stmt2 = $conn->prepare("UPDATE users
//                                                                                            SET email = ?, location = ?, studio = ?, role = ?, about = ?
//                                                                                            WHERE userID = ?");
//                                                                    $stmt2->bind_param('sssssi', $email, $location, $studio, $role, $about, $userID);
//                                                                    $stmt2->execute();
//                                                                } catch (PDOException $e) {
//                                                                    echo "Error: " . $e->getMessage();
//                                                                }
//                                                            }
//
//                                                        } else {
//                                                            $_SESSION['settings_error'] = "Incorrect password. Please try again.";
//                                                            print_r($_SESSION['settings_error']);
//                                                            //header("Refresh:3; url=../../settings.php");
//                                                            exit();
//                                                        }
                                                    }
                                                } else {
                                                    $_SESSION['settings_error'] = "New passwords do not match. Please try again.";
                                                    print_r($_SESSION['settings_error']);
                                                    //header("Refresh:3; url=../../settings.php");
                                                    exit();
                                                }
                                            } else {
                                                $_SESSION['settings_error'] = "About must be under 255 characters. Please try again.";
                                                print_r($_SESSION['settings_error']);
                                                //header("Refresh:3; url=../../settings.php");
                                                exit();
                                            }
//                                        } else {
//                                            $_SESSION['settings_error'] = "About can only contain letters, hyphens and whitespace. Please try again.";
//                                            print_r($_SESSION['settings_error']);
//                                            //header("Refresh:3; url=../../settings.php");
//                                            exit();
//                                        }
                                    } else {
                                        $_SESSION['settings_error'] = "Role must be under 50 characters. Please try again.";
                                        print_r($_SESSION['settings_error']);
                                        //header("Refresh:3; url=../../settings.php");
                                        exit();
                                    }
//                                } else {
//                                    $_SESSION['settings_error'] = "Role can only contain letters, hyphens and whitespace. Please try again.";
//                                    print_r($_SESSION['settings_error']);
//                                    //header("Refresh:3; url=../../settings.php");
//                                    exit();
//                                }
                            } else {
                                $_SESSION['settings_error'] = "Studio must be under 50 characters. Please try again.";
                                print_r($_SESSION['settings_error']);
                                //header("Refresh:3; url=../../settings.php");
                                exit();
                            }
//                        } else {
//                            $_SESSION['settings_error'] = "Studio can only contain letters, hyphens and whitespace. Please try again.";
//                            print_r($_SESSION['settings_error']);
//                            //header("Refresh:3; url=../../settings.php");
//                            exit();
//                        }
                    } else {
                        $_SESSION['settings_error'] = "Location must be under 50 characters. Please try again.";
                        print_r($_SESSION['settings_error']);
                        //header("Refresh:3; url=../../settings.php");
                        exit();
                    }
//                } else {
//                    $_SESSION['settings_error'] = "Location can only contain letters, hyphens and whitespace. Please try again.";
//                    print_r($_SESSION['settings_error']);
//                    //header("Refresh:3; url=../../settings.php");
//                    exit();
//                }
            } else {
                $_SESSION['settings_error'] = "You have left a required field blank. Please fill out the required fields.";
                print_r($_SESSION['settings_error']);
                //header("Refresh:3; url=../../settings.php");
                exit();
            }

        } else {
            $_SESSION['settings_error'] = "Verification failed. Please try again";
            print_r($_SESSION['settings_error']);
            //header("Refresh:3; url=../../settings.php");
            exit();
        }
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
