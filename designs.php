<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quill - Design Showcase</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/assets/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>`
</head>
<body>
<?php include 'header.php'; ?>
<div class="design-wrapper">
    <div class="design-banner">
        <h1>Design Showcase</h1>
        <p>Connecting people through tattoo designs</p>
    </div>
    <div class="design-sort-banner">
        <h3>Sort By</h3>
        <ul>
            <?php
            if (isset($_GET['sort'])) {
                if ($_GET['sort'] === 'views') {
                    echo "<li ><a class=\"design-active\" href=\"designs.php?sort=views\">Views</a></li>
                    <li class=\"padding-left\"><a href=\"designs.php?sort=likes\">Likes</a></li>
                    <li><a href=\"designs.php?sort=recent\" class=\"padding-left\">Recent</a></li>";
                } else if ($_GET['sort'] === 'likes') {
                    echo "<li ><a  href=\"designs.php?sort=views\">Views</a></li>
                    <li class=\"padding-left\"><a class=\"design-active\" href=\"designs.php?sort=likes\">Likes</a></li>
                    <li><a href=\"designs.php?sort=recent\" class=\"padding-left\">Recent</a></li>";
                } else if ($_GET['sort'] === 'recent') {
                    echo "<li><a  href=\"designs.php?sort=views\">Views</a></li>
                    <li class=\"padding-left\"><a href=\"designs.php?sort=likes\">Likes</a></li>
                    <li class=\"padding-left\"><a class=\"design-active\" href=\"designs.php?sort=recent\" class=\"padding-left\">Recent</a></li>";
                }
            } else {
                echo "<li ><a class=\"design-active\" href=\"designs.php?sort=views\">Views</a></li>
                    <li class=\"padding-left\"><a href=\"designs.php?sort=likes\">Likes</a></li>
                    <li><a href=\"designs.php?sort=recent\" class=\"padding-left\">Recent</a></li>";
            }
            ?>
        </ul>
        <?php

            //change the form action depending on which sort is specified in the url.
            if (isset($_GET['sort'])){
                if ($_GET['sort'] === 'views'){
                    echo "<form id=\"design-form\" name=\"design-search\" action=\"designs.php?sort=views\" method=\"POST\">
                <input id=\"design-search\" type=\"text\" name=\"design-search\" placeholder=\"\"> <input id=\"tattoo-search-button\" type=\"submit\" name\"design-search-submit\" value=\"Search\">
                </form>";
                } else if ($_GET['sort'] === 'likes'){
                    echo "<form id=\"design-form\" name=\"design-search\" action=\"designs.php?sort=likes\" method=\"POST\">
                <input id=\"design-search\" type=\"text\" name=\"design-search\" placeholder=\"\"> <input id=\"tattoo-search-button\" type=\"submit\" name\"design-search-submit\" value=\"Search\">
                </form>";
                } else if($_GET['sort'] === 'recent'){
                    echo "<form id=\"design-form\" name=\"design-search\" action=\"designs.php?sort=recent\" method=\"POST\">
                <input id=\"design-search\" type=\"text\" name=\"design-search\" placeholder=\"\"> <input id=\"tattoo-search-button\" type=\"submit\" name\"design-search-submit\" value=\"Search\">
                </form>";
                }
            } else {
                echo "<form id=\"design-form\" name=\"design-search\" action=\"designs.php\" method=\"POST\">
                <input id=\"design-search\" type=\"text\" name=\"design-search\" placeholder=\"\"> <input id=\"tattoo-search-button\" type=\"submit\" name\"design-search-submit\" value=\"Search\">
                </form>";
            }

        ?>

    </div>

    <div id="design-main">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['sort'])){
                    if ($_GET['sort'] === 'views') {
                        require "./app/db.conn.php";

                        $search = isset($_REQUEST['design-search']) ? $_REQUEST['design-search'] : null;

                        $sql = "SELECT tattooID, tattooImage, tattooViews, tattooShares, tattooLikes, tattooName, tattooDescription FROM tattoos";

                        $sqlcondition = "";

                        if (!empty($search)){
                            $sqlcondition = $sqlcondition . " WHERE tattooName LIKE ?";
                        }
                        $searchTerm = filter_has_var(INPUT_POST, 'design-search') ? $_POST['design-search']: null;
                        $searchTerm = $conn->real_escape_string($searchTerm);
                        $searchTerm = '%' . $searchTerm . '%';

                        $sqlfinal = $sql . $sqlcondition . " ORDER BY tattooViews";

                        $stmt = $conn->prepare($sqlfinal);
                        if ($sqlcondition != "") {
                            $stmt->bind_param("s", $searchTerm);
                        }
                        $stmt->execute();
                        $stmt->bind_result($tattooID, $tattooImage, $tattooViews, $tattooShares, $tattooLikes, $tattooName, $tattooDescription);

                        if ($stmt) {
                            while ($stmt->fetch()) {
                                echo '<div id="design-tattoo-container" class="col-md-4">
                                    <div id="design-tattoo-image-wrapper" class="row">
                                        <div id="design-tattoo-image" class="col-md-10 dtc">
                                                    <img src="' . $tattooImage . '">
                                                    <a href="./tattoo.php?tattooID=' . $tattooID . '">
                                                        <div class="image-overlay">
                                                            <div class="image-overlay-text">
                                                                <h2>' . $tattooName . '</h2>
                                                                <p>' . $tattooDescription . '</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                    </div>
                                    <div id="design-tattoo-social-wrapper" class="row">
                                        <div id="design-tattoo-social" class="col-md-1">

                                        </div>
                                        <div id="design-tattoo-social" class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>' . $tattooViews . '</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="design-tattoo-social" class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="tattoo-social-share" src="resources/assets/img/share2.png">
                                                </div>
                                                <div class="col-md-2">
                                                    <p>' . $tattooShares . '</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="design-tattoo-social" class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="material-icons">favorite</i>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>' . $tattooLikes . '</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="design-tattoo-social" class="col-md-1">

                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo "Nothing to retrieve!";
                        }
                    } else if ($_GET['sort'] === 'likes'){

                        require "./app/db.conn.php";

                        $search = isset($_REQUEST['design-search']) ? $_REQUEST['design-search'] : null;

                        $sql = "SELECT tattooID, tattooImage, tattooViews, tattooShares, tattooLikes, tattooName, tattooDescription FROM tattoos ";

                        $sqlcondition = "";

                        if (!empty($search)){
                            $sqlcondition = $sqlcondition . " WHERE tattooName LIKE ?";

                        }
                        $searchTerm = filter_has_var(INPUT_POST, 'design-search') ? $_POST['design-search']: null;
                        $searchTerm = $conn->real_escape_string($searchTerm);
                        $searchTerm = '%' . $searchTerm . '%';

                        $sqlfinal = $sql . $sqlcondition . "ORDER BY tattooLikes";

                        $stmt = $conn->prepare($sqlfinal);
                        if ($sqlcondition != "") {
                            $stmt->bind_param("s", $searchTerm);
                        }
                        $stmt->execute();
                        $stmt->bind_result($tattooID, $tattooImage, $tattooViews, $tattooShares, $tattooLikes, $tattooName, $tattooDescription);

                        if ($stmt) {
                            while ($stmt->fetch()) {
                                echo '<div id="design-tattoo-container" class="col-md-4">
                                        <div id="design-tattoo-image-wrapper" class="row">
                                            <div id="design-tattoo-image" class="col-md-10 dtc">
                                                    <img src="' . $tattooImage . '">
                                                    <a href="./tattoo.php?tattooID=' . $tattooID . '">
                                                        <div class="image-overlay">
                                                            <div class="image-overlay-text">
                                                                <h2>' . $tattooName . '</h2>
                                                                <p>' . $tattooDescription . '</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                        </div>
                                        <div id="design-tattoo-social-wrapper" class="row">
                                            <div id="design-tattoo-social" class="col-md-1">
    
                                            </div>
                                            <div id="design-tattoo-social" class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>' . $tattooViews . '</p>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <div id="design-tattoo-social" class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img class="tattoo-social-share" src="resources/assets/img/share2.png">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>' . $tattooShares . '</p>
                                                    </div>
                                                </div>
    
                                            </div>
                                            <div id="design-tattoo-social" class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <i class="material-icons">favorite</i>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>' . $tattooLikes . '</p>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <div id="design-tattoo-social" class="col-md-1">
    
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo "Nothing to retrieve!";
                        }
                    }  else if ($_GET['sort'] === 'recent') {
                        require "./app/db.conn.php";

                        $search = isset($_REQUEST['design-search']) ? $_REQUEST['design-search'] : null;

                        $sql = "SELECT tattooID, tattooImage, tattooViews, tattooShares, tattooLikes, tattooName, tattooDescription FROM tattoos";

                        $sqlcondition = "";

                        if (!empty($search)) {
                            $sqlcondition = $sqlcondition . " WHERE tattooName LIKE ?";

                        }
                        $searchTerm = filter_has_var(INPUT_POST, 'design-search') ? $_POST['design-search'] : null;
                        $searchTerm = $conn->real_escape_string($searchTerm);
                        $searchTerm = '%' . $searchTerm . '%';

                        $sqlfinal = $sql . $sqlcondition . " ORDER BY tattooDate";

                        $stmt = $conn->prepare($sqlfinal);
                        if ($sqlcondition != "") {
                            $stmt->bind_param("s", $searchTerm);
                        }
                        $stmt->execute();
                        $stmt->bind_result($tattooID, $tattooImage, $tattooViews, $tattooShares, $tattooLikes, $tattooName, $tattooDescription);

                        if ($stmt) {
                            while ($stmt->fetch()) {
                                echo '<div id="design-tattoo-container" class="col-md-4">
                                        <div id="design-tattoo-image-wrapper" class="row">
                                            <div id="design-tattoo-image" class="col-md-10 dtc">
                                                    <img src="' . $tattooImage . '">
                                                    <a href="./tattoo.php?tattooID=' . $tattooID . '">
                                                        <div class="image-overlay">
                                                            <div class="image-overlay-text">
                                                                <h2>' . $tattooName . '</h2>
                                                                <p>' . $tattooDescription . '</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                        </div>
                                        <div id="design-tattoo-social-wrapper" class="row">
                                            <div id="design-tattoo-social" class="col-md-1">
    
                                            </div>
                                            <div id="design-tattoo-social" class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>' . $tattooViews . '</p>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <div id="design-tattoo-social" class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img class="tattoo-social-share" src="resources/assets/img/share2.png">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>' . $tattooShares . '</p>
                                                    </div>
                                                </div>
    
                                            </div>
                                            <div id="design-tattoo-social" class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <i class="material-icons">favorite</i>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>' . $tattooLikes . '</p>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <div id="design-tattoo-social" class="col-md-1">
    
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo "Nothing to retrieve!";
                        }
                    }
                    } else {
                        require "./app/db.conn.php";

                        $search = isset($_REQUEST['design-search']) ? $_REQUEST['design-search'] : null;

                        $sql = "SELECT tattooID, tattooImage, tattooViews, tattooShares, tattooLikes, tattooName, tattooDescription FROM tattoos";

                        $sqlcondition = "";

                        if (!empty($search)) {
                            $sqlcondition = $sqlcondition . " WHERE tattooName LIKE ?";

                        }
                        $searchTerm = filter_has_var(INPUT_POST, 'design-search') ? $_POST['design-search'] : null;
                        $searchTerm = $conn->real_escape_string($searchTerm);
                        $searchTerm = '%' . $searchTerm . '%';

                        $sqlfinal = $sql . $sqlcondition . " ORDER BY tattooDate";

                        $stmt = $conn->prepare($sqlfinal);
                        if ($sqlcondition != "") {
                            $stmt->bind_param("s", $searchTerm);
                        }
                        $stmt->execute();
                        $stmt->bind_result($tattooID, $tattooImage, $tattooViews, $tattooShares, $tattooLikes, $tattooName, $tattooDescription);

                        if ($stmt) {
                            while ($stmt->fetch()) {
                                echo '<div id="design-tattoo-container" class="col-md-4">
                                            <div id="design-tattoo-image-wrapper" class="row">
                                                <div id="design-tattoo-image" class="col-md-10 dtc">
                                                    <img src="' . $tattooImage . '">
                                                    <a href="./tattoo.php?tattooID=' . $tattooID . '">
                                                        <div class="image-overlay">
                                                            <div class="image-overlay-text">
                                                                <h2>' . $tattooName . '</h2>
                                                                <p>' . $tattooDescription . '</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="design-tattoo-social-wrapper" class="row">
                                                <div id="design-tattoo-social" class="col-md-1">
        
                                                </div>
                                                <div id="design-tattoo-social" class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <i class="material-icons">remove_red_eye</i>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>' . $tattooViews . '</p>
                                                        </div>
        
                                                    </div>
                                                </div>
                                                <div id="design-tattoo-social" class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img class="tattoo-social-share" src="resources/assets/img/share2.png">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>' . $tattooShares . '</p>
                                                        </div>
                                                    </div>
        
                                                </div>
                                                <div id="design-tattoo-social" class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <i class="material-icons">favorite</i>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>' . $tattooLikes . '</p>
                                                        </div>
        
                                                    </div>
                                                </div>
                                                <div id="design-tattoo-social" class="col-md-1">
        
                                                </div>
                                            </div>
                                        </div>';
                            }
                        } else {
                            echo "Nothing to retrieve!";
                        }
                    }
                ?>
            </div>


        </div>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>
<script type='text/javascript' src="./resources/assets/js/app-min.js"> </script>
</body>
</html>
