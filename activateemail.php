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
                    <h2>You're almost there...</h2>
                </div>
                <div class="activate-form-input">
                    <img src="resources/images/email.png"><br>
                    <h3>Please confirm your email address by clicking the form we sent to:</h3>
                    <p>Cohen.macdonald1@gmail.com</p>

                </div>
                <div class="activate-form-signup">
                    <p><span class="activate-highlight">Didn't receive an email? Click here to resend</span></p>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
