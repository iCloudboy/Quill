<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2NAME</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/assets/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>`
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="index-wrapper">
        <div class="index-banner">
        </div>
        <div class="index-sort-banner">
            <ul>
                <a href="popular.php"><li class="index-active">Popular</li></a>
                <li>Recent</li>
            </ul>
        </div>
        <div class="index-main">
            <div class="container">
                <div class="row" style="background-color: blue;">
                    <div class="col-md-2">
                        <div class="index-tattoo-wrapper-image"><img src="resources/images/tattoo3.png"/></div>
                        <div class="index-tattoo-wrapper-social">
                            <div class="index-tattoo-wrapper-social-views"><i class="material-icons">remove_red_eye</i> <p>22,000</p></div>
                            <div class="index-tattoo-wrapper-social-comments"><i class="material-icons">comment</i> <p>24</p></div>
                            <div class="index-tattoo-wrapper-social-likes"><i class="material-icons">favorite</i> <p>254</p></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="index-tattoo-wrapper-image"><img src="resources/images/tattoo1.png"/></div>
                        <div class="index-tattoo-wrapper-social">
                            <div class="index-tattoo-wrapper-social-views"><i class="material-icons">remove_red_eye</i> <p>22,000</p></div>
                            <div class="index-tattoo-wrapper-social-comments"><i class="material-icons">comment</i> <p>24</p></div>
                            <div class="index-tattoo-wrapper-social-likes"><i class="material-icons">favorite</i> <p>254</p></div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="index-tattoo-wrapper-image"><img src="resources/images/tattoo2.png"/></div>
                        <div class="row">
                            <div class="index-tattoo-wrapper-social-views"><i class="material-icons">remove_red_eye</i> <p>22,000</p></div>
                            <div class="index-tattoo-wrapper-social-comments"><i class="material-icons">comment</i> <p>24</p></div>
                            <div class="index-tattoo-wrapper-social-likes"><i class="material-icons">favorite</i> <p>254</p></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="background-color: red;">
                    <div class="col-md-4">
                        <div class="index-tattoo-wrapper-image"><img src="resources/images/tattoo3.png"/></div>
                        <div class="row">
                            <div class="index-tattoo-wrapper-social-views"><i class="material-icons">remove_red_eye</i> <p>22,000</p></div>
                            <div class="index-tattoo-wrapper-social-comments"><i class="material-icons">comment</i> <p>24</p></div>
                            <div class="index-tattoo-wrapper-social-likes"><i class="material-icons">favorite</i> <p>254</p></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="index-tattoo-wrapper-image"><img src="resources/images/tattoo1.png"/></div>
                        <div class="row">
                            <div class="col-md-4"><i class="material-icons">remove_red_eye</i> <p>22,000</p></div>
                            <div class="col-md-4"><i class="material-icons">comment</i> <p>24</p></div>
                            <div class="col-md-4"><i class="material-icons">favorite</i> <p>254</p></div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="index-tattoo-wrapper-image"><img src="resources/images/tattoo2.png"/></div>
                        <div class="row">
                            <div class="col-md-4"><i class="material-icons">remove_red_eye</i> <p>22,000</p></div>
                            <div class="col-md-4"><i class="material-icons">comment</i> <p>24</p></div>
                            <div class="col-md-4"><i class="material-icons">favorite</i> <p>254</p></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script type='text/javascript' src="./resources/assets/js/app-min.js"> </script>
</body>
</html>
