<?php session_start(); if (!isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Activate</title>
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <?php include 'header.php'; ?>
    </head>
    <body>
    <div class="login-wrapper">
        <div class="login-form-wrapper">
            <div class="login-form">
                <div class="login-form-title">
                    <h2>NAME</h2>
                </div>
                <div class="login-form-input">
                    <?php
                    require "app/db.conn.php";
                    require "app/functions/sendmail.func.php";
                    if (isset($_GET['success'])) { //check if the success parameter was passed through the url
                    ?>
                        <h2>Thanks, your account has been activated.</h2>
                    <?php
                        header("Refresh:3; url=login.php");
                    } else {
                        if (isset($_GET['email'], $_GET['email_code'])) {
                            $email = trim($_GET['email']);
                            $email_code = trim($_GET['email_code']);

                            try {
                                $stmt = $conn->prepare("SELECT userID FROM users WHERE email = ?");
                                $stmt->bind_param("s", $email);
                                $stmt->execute();
                                $stmt->bind_result($userID);


                                if (!$stmt->fetch()){ //check if email address exists in the database
                                    $_SESSION['activate_error'] = "Sorry! something went wrong, we couldn't find that email address.";
                                    //header("Refresh:3; url=/login.php");
                                    print_r($_SESSION['activate_error']);

                                } else if(activate($email, $email_code) === false) { //the activate function failed and returned false
                                    $_SESSION['activate_error'] = "Sorry! something went wrong, we couldn't activate your account.";
                                    //header("Refresh:3; url=/login.php");
                                    print_r($_SESSION['activate_error']);

                                } else { //activate function did not fail and returned true.
                                    $_SESSION['activate_valid'] = "email validated!";
                                    print_r($_SESSION['activate_valid']);
                                    header("Location: activate.php?success");


                                }
                            } catch(PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        } else {
                            $_SESSION['activate_error'] = "Sorry! something went wrong, we couldn\'t activate your account.";
                            //header("Refresh:3; url=/login.php");
                            print_r($_SESSION['activate_error']);
                        }
                    }


                    ?>
                </div>
                <div class="login-form-signup">
                    <p>Don't have an account?</p>
                    <a href="register.php"><p><span class="login-highlight">Sign up here</span></p></a>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
