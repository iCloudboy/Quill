<?php session_start();
include('./app/functions/updateviewcount.php');
updateViewCount();
if (isset($_GET['tattooID'])){
    $_SESSION['tattooID'] = $_GET['tattooID'];
}

if (isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Quill - Tattoo Details</title>
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php include 'header.php'; ?>
    </head>
    <body>
    <div class="tattoo-wrapper">
        <div class="tattoo-artist-details">
            <div class="tattoo-artist-picture">
                <?php
                    $tattooID = $_GET['tattooID'];
                    if (retrieveArtistPicture($tattooID) == false){
                        echo 'No image to retrieve';
                    } else {
                        echo '<img class="tattoo-artist-image" src=./' . retrieveArtistPicture($_SESSION['tattooID']). ' alt=' . retrieveForename() . '\'s profile picture\">';
                    }
                ?>
            </div>
            <div class="tattoo-details-wrapper">
                <div class="tattoo-title">
                    <?php
                        echo '<h1>' . retrieveTattooTitle() . '</h1>';
                    ?>

                </div>
                <div class="tattoo-artist-name">
                    <?php
                        echo '<p>By <span class="tattoo-highlight">' . retrieveArtistForename() . ' ' . retrieveArtistSurname() . '</span> on ' . retrieveTattooDate() . '</p>';
                    ?>
                </div>
            </div>
        </div>
        <div class="tattoo-content">
            <div class="tattoo-left-container">
                <div class="tattoo-social-media-wrapper">
                    <div class="tattoo-social-media-like">
                        <?php
                            echo '<a href=""><i class="material-icons ">favorite</i></a> <p><span>' . retrieveTattooLikes() .  '</span> Likes</p>';
                        ?>
                    </div>
                    <div class="tattoo-social-media-share">
                        <?php
                            echo '<a href=""><img src="resources/assets/img/share2.png"></a> <p>' . retrieveTattooShares() . ' Shares</p>'
                        ?>
                    </div>
                    <div class="tattoo-social-media-view">
                        <?php
                            echo '<a href=""><i class="material-icons">remove_red_eye</i></a> <p>' . retrieveTattooViews() . ' Views</p>';
                        ?>
                    </div>

                </div>
                <div class="tattoo-tags-wrapper">
                    <?php
                        echo '<p>Tags: <span class="tattoo-tags">Example 1</span><span class="tattoo-tags">Example 2</span></p>';
                    ?>
                </div>
            </div>
            <div class="tattoo-right-container">
                <?php
                    if (empty(retrieveArtistPicture($_SESSION['tattooID'])) === false){
                        echo '<img class="tattoo-image" src=./' . retrieveTattooImage($_SESSION['tattooID']). ' alt=' . retrieveArtistForename() . '\'s tattoo design\">';
                    } else {
                        echo "what";
                    }
                ?>


            </div>
        </div>
        <div class="tattoo-comment-section-wrapper">
            <div class="tattoo-comment-section-left">
                <div class="tattoo-comment-heading-wrapper">
                    <div class="tattoo-comment-number">
                        <?php
                            include './app/db.conn.pdo.php';	// make db connection
                            $sql="SELECT COUNT(*) AS total FROM comments c
                                  INNER JOIN tattoos t
                                  ON c.tattooID = t.tattooID
                                  WHERE c.tattooID = ?";

                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(1, $tattooID,PDO::PARAM_INT);
                            $stmt->execute();
                            $count = $stmt->fetchColumn();



                            echo '<h2>' . $count . ' Comments</h2>';

                        ?>
                    </div>
                    <div class="tattoo-comment-sort">
                        <p id="tattoo-oldest">Oldest</p>
                        <p id="tattoo-newest" class="tattoo-sort-highlight">Newest</p>
                    </div>
                </div>
                <div class="tattoo-comment-display-wrapper">
                    <?php

                        $tattooID = $_SESSION['tattooID'];

                        try {
                            include './app/db.conn.php';	// make db connection
                            $sql = "SELECT picture, comment, forename, surname, commentDate, u.userID FROM comments c
                                    INNER JOIN users u 
                                    ON c.userID = u.userID
                                    WHERE c.tattooID = ?
                                    ORDER BY c.commentID DESC";

                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $tattooID);
                            $stmt->execute();
                            $stmt->bind_result($profilepicture, $comment, $forename, $surname, $date, $userID);

                            while ($row = $stmt->fetch()){

                                $formatteddate = date("jS F Y", strtotime($date));
                                echo '<div class="tattoo-individual-comment-wrapper">
                                        <div class="tattoo-comment-image">
                                            <img src="' . $profilepicture . '">
                                        </div>
                                        <div class="tattoo-individual-comment-details-wrapper">
                                            <div class="tattoo-individual-comment-name">
                                                <a href="profile.php?userID=' . $userID . '"><p class="tattoo-comment-name-highlight">'. $forename . ' ' . $surname . '</p></a>
                                                <p>' . $formatteddate . '</p>
                                            </div>
                                            <div class="tattoo-individual-comment">
                                                <p>' . $comment . '</p>
                                            </div>
                                        </div>
                                    </div>';
                         }
                        } catch (PDOException $e) {
                            echo $stmt . '<br>' . $e->getMessage();
                        }
                    ?>
                </div>

            </div>
            <div class="tattoo-comment-section-right">
                <div class="tattoo-comment-post-title-wrapper">
                    <h2>Post a comment</h2>
                </div>
                <div class="tattoo-comment-post-input">
                    <form class="tattoo-comment-post-form" method="post" action="./app/functions/commentprocess.func.php">
                        <textarea class="tattoo-comment" id="comment" name="comment"></textarea>
                        <div class="tattoo-comment-post-submit">
                            <div id="upload-captcha" class="g-recaptcha" data-sitekey="6LdlDhwUAAAAAMTabZIQXNL0qVfRtKfEYYlCe-bz"></div>
                            <input class="tattoo-submit-button" type="submit" name="tattoo-submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type='text/javascript' src="./resources/assets/js/app-min.js"> </script>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>

