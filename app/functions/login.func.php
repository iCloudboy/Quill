<?php
require "../db.conn.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$userIP = $_SERVER['REMOTE_ADDR']; //get the users ip address
$email = filter_has_var(INPUT_POST, 'email') ? $_POST['email']: null;
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;

if (isset($_POST['login'])) {
    //check how many times someone has logged in from this IP address.
    $sql= "SELECT * FROM ipaddress WHERE loginIP = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userIP);
    $stmt->execute();

    if ($stmt->num_rows() >= 3) {
        $_SESSION['login_error'] = "You have tried to log in too many times.";
        print_r($_SESSION['login_error']);
        header("Refresh:3; url=/login.php");
        exit();
    } else {
        $stmt->close();
        if (!empty($email) && !empty($password)) {
            //if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //check for valid email address
            if (strlen($email) <= 50) { //check that the email address is no more than 50 characters
                if (strlen($password) <= 50) {
                    try {
                        $stmt = $conn->prepare("SELECT userID, password FROM users WHERE email = ?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $stmt->bind_result($userID, $passInDB);


                        if ($stmt->fetch()) {
                            if (password_verify($password, $passInDB)) {
                                $stmt->close();
                                $stmt2 = $conn->prepare("SELECT active FROM users WHERE userID = ?");
                                $stmt2->bind_param("i", $userID);
                                $stmt2->execute();
                                $stmt2->bind_result($active);

                                if ($stmt2->fetch()) {
                                    if ($active === 0) {
                                        $_SESSION['login_error'] = "User is not active. Please click the link in your activation email.";
                                        //header("Refresh:3; url=/login.php");
                                        print_r($_SESSION['login_error']);
                                        exit();
                                    } else {
                                        $_SESSION['user'] = $userID;
                                        header("Location: ../../index.php");
                                    }
                                } else {

                                }
                            } else {

                                $incorrectpasswordsql = "INSERT INTO ipaddress VALUES (?)";
                                $stmt3 = $conn->prepare($incorrectpasswordsql);
                                $stmt3->bind_param(1, $userIP);
                                $stmt3->execute();

                                if ($stmt3 != false){
                                    echo "incorrect password. Please try again.";
                                    header("Refresh:3; url=/login.php");
                                    exit();
                                } else {
                                    echo "Error storing ip address.";
                                }


                            }
                        } else {


                            $_SESSION['login_error'] = "Email address not registered. Please enter a valid email address";
                            //header("Refresh:3; url=/login.php");
                            print_r($_SESSION['login_error']);
                            exit();
                        }

                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                } else {
                    $_SESSION['login_error'] = "Password must be no more than 50 characters. Please try again.";
                    print_r($_SESSION['login_error']);
                    header("Refresh:3; url=/login.php");
                    exit();
                }
            } else {
                $_SESSION['login_error'] = "Email address must be no more than 50 characters. Please try again.";
                print_r($_SESSION['login_error']);
                header("Refresh:3; url=/login.php");
                exit();
            }
//        //} else {
//            $_SESSION['login_error'] = "Please enter a valid email address.";
//            print_r($_SESSION['login_error']);
//            header("Refresh:3; url=/login.php");
//            exit();
//        }
        } else {
            $_SESSION['login_error'] = "Input fields cannot be empty. Please try again.";
            print_r($_SESSION['login_error']);
            header("Refresh:3; url=/login.php");
            exit();
        }
    }
} else {
    $_SESSION['login_error'] = "An error has occurred. Please try again";
    print_r($_SESSION['login_error']);
    header("Refresh:3; url=/login.php");
    exit();
}
