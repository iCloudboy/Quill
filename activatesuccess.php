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
    <div class="activate-wrapper">
        <div class="activate-form-wrapper">
            <div class="activate-form">
                <div class="activate-form-title">
                    <br>
                    <h2>Your account has been confirmed!</h2>
                </div>
                <div class="activate-form-input">
                    <img src="resources/images/email.png"><br>
                    <h3>Redirecting you to the login page...</h3>
                    <?php
                        header("Refresh:3; url=/login.php");
                    ?>
                </div>
                <div class="activate-form-signup">
                    <p><span class="activate-highlight">Taking too long? Click here to go to the login page</span></p>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
