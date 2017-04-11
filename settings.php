<?php session_start(); if (isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Account Settings</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="resources/assets/css/app.css">
        <?php include 'header.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
    <div class="settings-wrapper">
        <div class="settings-form-wrapper">
            <div class="settings-form-wrapper-left">
                <div class="settings-form-wrapper-left-img">
                    <img src="resources/images/me.jpg"/>
                </div>
                <div class="settings-form-wrapper-left-text">
                    <form>
                        <div class="form-group">
                            <div class="col-md-4">
                                <input id="filebutton" name="filebutton" class="input-file" type="file">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="settings-form-wrapper-right">
                <div class="settings-form-wrapper-right-title">
                    <h2>Update your <span class="settings-highlight">account details</span></h2>
                </div>

                <div class="settings-form-wrapper-right-form">
                    <form id="settings-update-form" class="form-horizontal">
                            <!-- Email address-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email Address</label>
                                <div class="col-md-8">
                                    <input id="email" name="email" type="text" placeholder="" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Password-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>
                                <div class="col-md-8">
                                    <input id="password" name="password" type="password" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Location-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="location">Location</label>
                                <div class="col-md-8">
                                    <input id="location" name="location" type="text" placeholder="" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Studio-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="studio">Tattoo Studio</label>
                                <div class="col-md-8">
                                    <input id="studio" name="studio" type="text" placeholder="" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Role -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="role">Job Role</label>
                                <div class="col-md-8">
                                    <input id="role" name="role" type="text" placeholder="" class="form-control input-md">

                                </div>
                            </div>
                            <!-- About me -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="about">About Me</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="about" name="about"></textarea>
                                </div>
                            </div>
                            <!-- google Captcha -->
                            <div class="form-group">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-6">
                                    <div class="g-recaptcha" data-sitekey="6LdlDhwUAAAAAMTabZIQXNL0qVfRtKfEYYlCe-bz"></div><br>
                                </div>
                            </div>
                            <!-- Submit -->
                            <div class="form-group">
                                <div class="col-md-8">
                                </div>
                                <div id="settings-form-submit" class="col-md-4">
                                    <button type="submit" id="settings-submit-button" name="settings-submit" class="btn btn-primary flex-last">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </body>
    </html>
<?php } else { header('Location: index.php'); } ?>
