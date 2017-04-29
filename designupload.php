<?php
session_start();
require_once './app/functions/usercheck.func.php';
if (isset($_SESSION['user']) && userType($_SESSION['user']) == true) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Account upload</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <?php include 'header.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
    <div class="upload-wrapper">
        <div class="upload-form-wrapper">
            <div class="upload-form-wrapper-left">
                <div class="upload-form-wrapper-left-img">
                    <!--<img src="resources/images/me.jpg"/> -->
                    <?php
                    require "./app/functions/uploadpicture.func.php";

                    if (isset($_FILES['tattoo'])){
                        if (empty($_FILES['tattoo']['name'])) {
                            echo 'please choose a file';
                        } else {
                            $allowed = array('jpg', 'jpeg', 'png');
                            $file_name = $_FILES['tattoo']['name'];
                            $explode = explode('.', $file_name); //determines what the file extension is using the explode() function. This function returns an array of strings that have been split on a boundary. Which in this case is the "." in the file name
                            $file_extension = strtolower(end($explode)); //forces the file extension to be lowercase and selects the last element in the array returned from explode()
                            $file_temp = $_FILES['tattoo']['tmp_name'];

                            if (in_array($file_extension, $allowed)){
                                //upload_tattoo_image($_SESSION['user'], $file_temp, $file_extension);
                                upload_tattoo_image($_SESSION['user'], $file_temp, $file_extension);
                            } else {
                                echo 'incorrect file type. Allowed file types: ';
                                echo implode(', ', $allowed); //as opposed to explode() this joins array elements with a string
                            }

                        }
                    }

                    $tattooID = $_SESSION['tattooID'];
                    if (empty(retrievePicture()) === false){
                        echo '<img src="' . retrieveTattooImage($tattooID) . '" alt="' . retrieveForename() . '\'s tattoo image   ">';
                    }

                    ?>
                </div>
                <div class="upload-form-wrapper-left-text">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input id="filebutton" name="tattoo" class="input-file" type="file">
                                <input class="upload-tattoo-submit" type="submit" value="Upload Image">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="upload-form-wrapper-right">
                <div class="upload-form-wrapper-right-form">
                    <form action="app/functions/uploadtattoo.func.php" method="POST">
                        <div class="upload-form-fields">
                            <h3>Title</h3>
                            <input type="text" id="tattoo-title" name="title" maxlength="50">
                            <h3>Description</h3>
                            <textarea class="tattoo-description" id="description" name="description"></textarea>
                            <h3>Tags</h3>
                            <input type="text" id="tattoo-tags" name="tags" maxlength="50">
                        </div><br><br>
                        <div class="upload-form-captchasubmit">
                            <div id="upload-captcha" class="g-recaptcha" data-sitekey="6LdlDhwUAAAAAMTabZIQXNL0qVfRtKfEYYlCe-bz"></div><br>
                            <input type="submit" class="upload-submit" value="Upload" name="upload-submit"/>
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
