<?php session_start(); if (isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Activate</title>
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
        <?php include 'header.php'; ?>
    </head>
    <body>
    <div class="activate-wrapper">
        <div class="activate-form-wrapper">
            <div class="activate-form">
                <div class="activate-form-title">
                    <h2>Booking accepted!</h2>
                </div>
                <div class="activate-form-input">
                    <i class="material-icons">done</i>
                    <h3>Redirecting you to the bookings page...</h3>
                </div>

                <?php
                    header("Refresh:3; url=/mybookings.php");
                ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
