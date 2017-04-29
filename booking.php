<?php session_start();
$artistID = $_GET['artistID'];
$_SESSION['artistID'] = $artistID;
if (isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Account booking</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <?php include 'header.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="booking-wrapper">
            <div class="booking-main">
                <div class="booking-form-wrapper-left">
                    <div class="booking-form-wrapper-left-img">
                        <!--<img src="resources/images/me.jpg"/> -->
                        <?php
                            require "./app/functions/uploadpicture.func.php";

                            if (empty(retrieveBookingPicture($artistID)) === false){
                                echo '<img src="' . retrieveBookingPicture($artistID). '" alt="' . retrieveForename() . '\'s profile picture">';
                            }

                        ?>
                    </div>
                    <div class="booking-form-wrapper-left-text">
                        <?php
                            echo '<h2>'. retrieveBookingForename($artistID) . ' ' . retrieveBookingSurname($artistID).  '</h2>';
                            echo '<p>' . retrieveBookingLocation($artistID) . '</p>';
                            echo '<p class="booking-studio-text">' . retrieveBookingRole($artistID) . " @ " . retrieveBookingStudio($artistID)  . '</p>';
                        ?>

                        <p class="booking-price-text">£35 / hour</p>
                    </div>

                </div>
                <div class="booking-form-wrapper-right">
                    <h1>Send a <span class="booking-highlight">booking request</span></h1>

                    <form class="booking-form" method="POST" action="./app/functions/bookingprocess.func.php">
                        <p>Describe your desired tattoo</p>
                        <textarea class="booking-form-description" id="description" name="description"></textarea>
                        <div class="booking-dropdown-container">
                            <div class="booking-dropdown-left">
                                <p>Desired Date</p>
                                <input type="date" name="date">
                            </div>
                            <div class="booking-dropdown-right">
                                <p>Desired Time</p>
                                <input type="time" name="time">
                            </div>
                        </div>
                        <div class="booking-captcha-submit">
                            <div class="g-recaptcha" data-sitekey="6LdlDhwUAAAAAMTabZIQXNL0qVfRtKfEYYlCe-bz"></div><br>
                            <input class="booking-submit" type="submit" value="Send Request" name="booking-submit"/>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php include 'footer.php'; ?>
    <script type='text/javascript' src="./resources/assets/js/app-min.js"> </script>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
