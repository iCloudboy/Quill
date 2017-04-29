<?php session_start();

$userID = $_SESSION['user'];
if (isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Quill - My Booking Requests</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <?php include 'header.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
    <div class="request-wrapper">
        <div class="request-main">
            <div class="request-title">
                <h1>My Booking Requests</h1>
            </div>
            <div class="request-container">
                <div class="request-heading">
                    <div class="request-name">
                        <h1>Name</h1>
                    </div>
                    <div class="request-description">
                        <h1>Message</h1>
                    </div>
                    <div class="request-date">
                        <h1>Date</h1>
                    </div>
                    <div class="request-acceptdecline">
                        <h1></h1>
                    </div>
                </div>
                <?php
                require './app/db.conn.php';

                try {
                    $sql = 'SELECT bookingID, forename, surname, bookingMessage, bookingDate, bookingTime FROM booking b 
                                INNER JOIN users u
                                ON b.userID = u.userID
                                WHERE artistID = ? AND accepted = ?';
                    $accepted = 1;
                    $stmt= $conn->prepare($sql);
                    $stmt->bind_param("ii", $userID, $accepted);
                    $stmt->execute();
                    $stmt->bind_result($bookingID, $forename, $surname, $bookingMessage, $bookingDate, $bookingTime);

                    if ($stmt) {
                        while ($stmt->fetch()){
                            echo '<div class="request-content">
                                        <div class="request-retrieve-name">
                                            <p>' . $forename .  '<br>
                                                ' .  $surname . '</p>
                                        </div>
                                        <div class="request-retrieve-description">
                                            <p>' . $bookingMessage . '</p>
                                        </div>
                                        <div class="request-retrieve-date">
                                            <p>' . date("jS F Y", strtotime($bookingDate)) . '</p>
                                            <p>' . $bookingTime . '</p>
                                        </div>
                                        <div class="request-retrieve-acceptdecline">
                                            <form method="POST" action="./app/functions/editcancel.func.php">
                                                <input type="hidden" value="' . $bookingID . '" name="bookingID">
                                                <input type="submit" name="accept" value="Edit">
                                                <input class="request-right-button" name="decline" type="submit" value="Cancel">
                                            </form>
                                   
                                        </div>
                                    </div>';
                        }
                    } else {
                        echo 'nothing was retrieved';
                    }

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

                ?>

            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type='text/javascript' src="./resources/assets/js/app-min.js"> </script>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
