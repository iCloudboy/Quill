<?php

require "../db.conn.pdo.php";
include 'sendmail.func.php';
session_start();

$firstname = filter_has_var(INPUT_POST, 'firstname') ? $_POST['firstname']: null;
$lastname = filter_has_var(INPUT_POST, 'lastname') ? $_POST['lastname']: null;
$email = filter_has_var(INPUT_POST, 'email') ? $_POST['email']: null;
$dobDay  = filter_has_var(INPUT_POST, 'DOBDay') ? $_POST['DOBDay']: null;
$dobMonth  = filter_has_var(INPUT_POST, 'DOBMonth') ? $_POST['DOBMonth']: null;
$dobYear  = filter_has_var(INPUT_POST, 'DOBYear') ? $_POST['DOBYear']: null;
$userPassword  = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
$confirmpassword  = filter_has_var(INPUT_POST, 'confirmpassword') ? $_POST['confirmpassword']: null;

////$firstname = mysqli_real_escape_string($conn, $firstname);
//$firstname = $conn->real_escape_string($firstname);
////$lastname = mysqli_real_escape_string($conn, $lastname);
//$lastname = $conn->real_escape_string($lastname);
////$dobDay = mysqli_real_escape_string($conn, $dobDay);
//$dobDay = $conn->real_escape_string($dobDay);
////$dobMonth = mysqli_real_escape_string($conn, $dobMonth);
//$dobMonth = $conn->real_escape_string($dobMonth);
////$dobYear = mysqli_real_escape_string($conn, $dobYear);
//$dobYear = $conn->real_escape_string($dobYear);
////$email = mysqli_real_escape_string($conn, $email);
//$email = $conn->real_escape_string($email);
////$userPassword = mysqli_real_escape_string($conn, $userPassword);
//$userPassword = $conn->real_escape_string($userPassword);
////$confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);
//$confirmpassword = $conn->real_escape_string($confirmpassword);

$dob = $dobYear . "-" . $dobMonth . "-" . $dobDay;

if (isset($_POST['new-user'])){  //check if submit button was pressed

    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //website secret key
        $secretkey = '6LdlDhwUAAAAAGHscAj6OQoWqZbgfeA3TEnOXnIW';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success) {

            if (!empty($firstname) && !empty($lastname) && !empty($dob) && !empty($email) && !empty($userPassword) && !empty($confirmpassword)) { //check if any of the input fields are empty

                if (preg_match("/^[a-zA-Z'-]+$/", $firstname)) { //check forename for any invalid characters

                    if (strlen($firstname) <= 20) { //check that the firstname field is no more than 20 characters

                        if (preg_match("/^[a-zA-Z'-]+$/", $lastname)) { //check surname for any invalid characters

                            if (strlen($lastname) <= 20) { //check that the lastname field is no more than 20 characters

                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //check for valid email address

                                    if (strlen($email) <= 50) { //check that the email address is no more than 50 characters

                                        if (strlen($userPassword) <= 50 && strlen($confirmpassword) <= 50) { //check that the password and password confirmation is no more than 50 characters

                                            if ($userPassword === $confirmpassword) { //check if the passwords match

                                                try {
                                                    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
                                                    $stmt->bindParam($stmt, $string = 's', $email);
                                                    $stmt->execute();
                                                } catch (PDOException $e) {
                                                    echo "Error: " . $e->getMessage();
                                                }

                                                if (!$stmt->fetch()) { //email doesn't exist
                                                    $passwordhash = password_hash($userPassword, PASSWORD_DEFAULT);
                                                    $userType = 1;
                                                    $emailCode = md5($email + microtime());
                                                    try {
                                                        $sql2 = "INSERT INTO users (forename,surname,dob,email,emailCode, password,userType)
                                                                 VALUES ('$firstname','$lastname', '$dob', '$email', '$emailCode', '$passwordhash', '$userType')";
                                                        $conn->exec($sql2);
                                                        email($email, 'Activate your Quill account', "
                                                        Hello " . $firstname . ",\n\n
                                                        Please activate your account using the link below:\n\n
                                                        
                                                        http://localhost:8888/activate.php?email=" . $email . "&email_code=" . $emailCode . " \n\n
                                                        
                                                        - Quill
                                                        ");
                                                        echo "New record created successfully";
                                                        header("Refresh:3; url=/login.php");
                                                    } catch (PDOException $e) {
                                                        echo $sql2 . '<br>' . $e->getMessage();
                                                    }

                                                } else { //email exists
                                                    echo "Email address is already registered. Please enter a new email address.";
                                                    header("Refresh:3; url=/register.php");
                                                    exit();
                                                }


                                            } else {
                                                echo "Passwords do not match. Please try again.";
                                                header("Refresh:3; url=/register.php");
                                                exit();
                                            }

                                        } else {
                                            echo "Password must be no more than 50 characters. Please try again.";
                                            header("Refresh:3; url=/register.php");
                                            exit();
                                        }
                                    } else {
                                        echo "Email address must be no more than 50 characters. Please try again.";
                                        header("Refresh:3; url=/register.php");
                                        exit();
                                    }
                                } else {
                                    echo "Please enter a valid email address.";
                                    header("Refresh:3; url=/register.php");
                                    exit();
                                }
                            } else {
                                echo "Last name must be no more than 20 characters. Please try again.";
                                header("Refresh:3; url=/register.php");
                                exit();
                            }
                        } else {
                            echo "Last name can only contain letters, hyphens and whitespace. Please try again.";
                            header("Refresh:3; url=/register.php");
                            exit();
                        }
                    } else {
                        echo "First name must be no more than 20 characters. Please try again.";
                        header("Refresh:3; url=/register.php");
                        exit();
                    }
                } else {
                    echo "Forename can only contain letters, hyphens and whitespace. Please try again.";
                    header("Refresh:3; url=/register.php");
                    exit();
                }
            } else {
                echo "Input fields cannot be empty. Please try again.";
                header("Refresh:3; url=/register.php");
                exit();
            }
        } else {
            echo "Robot verification failed, please try again.";
            header("Refresh:3; url=/register.php");
            exit();
        }
    } else {
        echo "Please click on the reCAPTCHA box.";
        header("Refresh:3; url=/register.php");
        exit();
    }
} else {
    echo "An error has occurred. Please try again";
    header("Refresh:3; url=/register.php");
    exit();
}

