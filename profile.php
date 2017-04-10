<?php session_start(); if (!isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign up</title>
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <?php include 'header.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
    <div class="profile-wrapper">
        <div class="profile-form-wrapper">
            <div class="profile-form-wrapper-left">
                <div class="profile-form-wrapper-left-img">
                    <img src="resources/images/me.jpg"/>
                </div>
                <div class="profile-form-wrapper-left-text">
                    <h2>Join the community</h2>
                </div>

            </div>
            <div class="profile-form-wrapper-right">
                <div class="profile-form-wrapper-right-title">
                    <h2>Create a <span class="profile-highlight">new account</span></h2>
                </div>

                <div class="profile-form-wrapper-right-form">
                   hi
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>