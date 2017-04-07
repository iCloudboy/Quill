<?php session_start(); if (!isset($_SESSION['user'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="resources/assets/css/app.css">
    <?php include 'header.php'; ?>
</head>
<body>
<div class="login-wrapper">
    <div class="login-form-wrapper">
        <div class="login-form">
            <div class="login-form-title">
                <h2>NAME</h2>
            </div>
            <div class="login-form-input">
                <form action="app/functions/login.func.php" method="POST">
                    <div class="login-form-userpass">
                        <h3>Email Address</h3>
                        <input type="text" id="email" name="email" maxlength="50">
                        <h3>Password</h3>
                        <input type="password" id="password" name="password" maxlength="50">
                    </div>
                    <div class="login-form-checksubmit">
                        <div class="login-form-checksubmit-check">
                            <input type="checkbox" class="login-rememberme" name="vehicle" value="Bike"> <p>Remember me</p>
                        </div>
                        <input type="submit" class="login-submit" value="Log In" name="login"/>
                    </div>
                </form>
            </div>
            <div class="login-form-signup">
                <p>Don't have an account?</p>
                <a href="register.php"><p><span class="login-highlight">Sign up here</span></p></a>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
<?php } else { header('Location: index.php'); } ?>
