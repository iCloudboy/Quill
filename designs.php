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
        <ul>
            <a href="popular.php"><li class="design-active">Popular</li></a>
            <a href="recent.php" class="padding-left"><li>Recent</li></a>
        </ul>
        <input id="design-search" type="text" placeholder="search">
    </div>

    <div id="design-main">
        <div class="container">
            <div class="row">
                <div id="design-tattoo-container" class="col-md-4">
                    <div id="design-tattoo-image-wrapper" class="row">
                        <div id="design-tattoo-image" class="col-md-10">
                            <img src="./resources/images/tattoo1.png">
                        </div>

                    </div>
                    <div id="design-tattoo-social-wrapper" class="row">

                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">remove_red_eye</i>
                                </div>
                                <div class="col-md-2">
                                    <p>22,000</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">comment</i>
                                </div>
                                <div class="col-md-2">
                                    <p>24</p>
                                </div>
                            </div>

                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">favorite</i>
                                </div>
                                <div class="col-md-2">
                                    <p>254</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-2">

                        </div>
                    </div>
                </div>
                <div id="design-tattoo-container" class="col-md-4">
                    <div id="design-tattoo-image-wrapper" class="row">
                        <div id="design-tattoo-image" class="col-md-10">
                            <img src="./resources/images/tattoo1.png">
                        </div>

                    </div>
                    <div id="design-tattoo-social-wrapper" class="row">

                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">remove_red_eye</i>
                                </div>
                                <div class="col-md-2">
                                    <p>22,000</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">comment</i>
                                </div>
                                <div class="col-md-2">
                                    <p>24</p>
                                </div>
                            </div>

                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">favorite</i>
                                </div>
                                <div class="col-md-2">
                                    <p>254</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-2">

                        </div>
                    </div>
                </div>
                <div id="design-tattoo-container" class="col-md-4">
                    <div id="design-tattoo-image-wrapper" class="row">
                        <div id="design-tattoo-image" class="col-md-10">
                            <img src="./resources/images/tattoo1.png">
                        </div>

                    </div>
                    <div id="design-tattoo-social-wrapper" class="row">

                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">remove_red_eye</i>
                                </div>
                                <div class="col-md-2">
                                    <p>22,000</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">comment</i>
                                </div>
                                <div class="col-md-2">
                                    <p>24</p>
                                </div>
                            </div>

                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">favorite</i>
                                </div>
                                <div class="col-md-2">
                                    <p>254</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-2">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="design-tattoo-container" class="col-md-4">
                    <div id="design-tattoo-image-wrapper" class="row">
                        <div id="design-tattoo-image" class="col-md-10">
                            <img src="./resources/images/tattoo1.png">
                        </div>

                    </div>
                    <div id="design-tattoo-social-wrapper" class="row">

                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">remove_red_eye</i>
                                </div>
                                <div class="col-md-2">
                                    <p>22,000</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">comment</i>
                                </div>
                                <div class="col-md-2">
                                    <p>24</p>
                                </div>
                            </div>

                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">favorite</i>
                                </div>
                                <div class="col-md-2">
                                    <p>254</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-2">

                        </div>
                    </div>
                </div>
                <div id="design-tattoo-container" class="col-md-4">
                    <div id="design-tattoo-image-wrapper" class="row">
                        <div id="design-tattoo-image" class="col-md-10">
                            <img src="./resources/images/tattoo1.png">
                        </div>

                    </div>
                    <div id="design-tattoo-social-wrapper" class="row">

                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">remove_red_eye</i>
                                </div>
                                <div class="col-md-2">
                                    <p>22,000</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">comment</i>
                                </div>
                                <div class="col-md-2">
                                    <p>24</p>
                                </div>
                            </div>

                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">favorite</i>
                                </div>
                                <div class="col-md-2">
                                    <p>254</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-2">

                        </div>
                    </div>
                </div>
                <div id="design-tattoo-container" class="col-md-4">
                    <div id="design-tattoo-image-wrapper" class="row">
                        <div id="design-tattoo-image" class="col-md-10">
                            <img src="./resources/images/tattoo1.png">
                        </div>

                    </div>
                    <div id="design-tattoo-social-wrapper" class="row">

                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">remove_red_eye</i>
                                </div>
                                <div class="col-md-2">
                                    <p>22,000</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">comment</i>
                                </div>
                                <div class="col-md-2">
                                    <p>24</p>
                                </div>
                            </div>

                        </div>
                        <div id="design-tattoo-social" class="col-md-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="material-icons">favorite</i>
                                </div>
                                <div class="col-md-2">
                                    <p>254</p>
                                </div>

                            </div>
                        </div>
                        <div id="design-tattoo-social" class="col-md-2">

                        </div>
                    </div>
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
