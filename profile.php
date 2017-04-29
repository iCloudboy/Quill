<?php session_start(); if (isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Quill - Profile</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <?php include 'header.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
    <?php ?>
    <div class="profile-wrapper">
        <div class="profile-top-wrapper">
            <div class="profile-top-wrapper-left">
                <div class="profile-image-wrapper">
                    <?php
                        if (empty(retrievePicture()) === false){
                            echo '<img class="profile-image" src="' . retrievePicture(). '" alt="' . retrieveForename() . '\'s profile picture">';
                        }
                    ?>
                </div>
                <div class="profile-image-text-wrapper">
                    <?php
                        echo "<h2 class='profile-image-name'>". retrieveForename() . " " .  retrieveSurname()  .  "</h2>";
                        echo "<p class='profile-image-location'>" . retrieveLocation() . "</p>";
                        echo "<p class='profile-image-job'>" . retrieveRole() . " @ " . retrieveStudio()  . " </p>";
                    ?>
                </div>
                <div class="profile-image-buttons-wrapper">
                    <button id="profile-button-booking" name="profile-booking" class="btn btn-primary flex-last">Request Booking</button>
                    <button id="profile-button-message" name="profile-message" class="btn btn-primary flex-last">Send Message</button>
                </div>
            </div>
            <div class="profile-top-wrapper-right">
                <h2>About me</h2>
                <?php echo "<p class='profile-about'>" . retrieveAbout() . "</p>"; ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type='text/javascript' src="./resources/assets/js/app-min.js"> </script>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
