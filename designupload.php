<?php session_start(); if (isset($_SESSION['user'])) { ?>
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

                    if (isset($_FILES['profile'])){
                        if (empty($_FILES['profile']['name'])) {
                            echo 'please choose a file';
                        } else {
                            $allowed = array('jpg', 'jpeg', 'png');
                            $file_name = $_FILES['profile']['name'];
                            $explode = explode('.', $file_name); //determines what the file extension is using the explode() function. This function returns an array of strings that have been split on a boundary. Which in this case is the "." in the file name
                            $file_extension = strtolower(end($explode)); //forces the file extension to be lowercase and selects the last element in the array returned from explode()
                            $file_temp = $_FILES['profile']['tmp_name'];

                            if (in_array($file_extension, $allowed)){
                                //upload_tattoo_image($_SESSION['user'], $file_temp, $file_extension);
                                $_SESSION['tattoo'] = upload_tattoo_image($_SESSION['user'], $file_temp, $file_extension);
                            } else {
                                echo 'incorrect file type. Allowed file types: ';
                                echo implode(', ', $allowed); //as opposed to explode() this joins array elements with a string
                            }

                        }
                    }
                    $tattooID=['tattoo'];
                    if (empty(retrievePicture()) === false){
                        echo '<img src="' . retrieveTattooImage($tattooID). '" alt="' . retrieveForename() . '\'s tattoo image   ">';
                    }

                    ?>
                </div>
                <div class="upload-form-wrapper-left-text">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input id="filebutton" name="profile" class="input-file" type="file">
                                <input type="submit">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="upload-form-wrapper-right">

                <div class="upload-form-wrapper-right-form">

                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type='text/javascript' src="./resources/assets/js/app-min.js"> </script>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
