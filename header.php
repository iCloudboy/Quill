<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="resources/assets/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
           rel="stylesheet">
</head>
<body>
    <div class="head-container">
        <div class="head-left-container">
            <div class="head-logo">
                <h1>NAME</h1>
            </div>
            <div class="head-links">
                <ul>
                    <a href="index.php"><li class="head-active">Home</li></a>
                    <li>Designs</li>
                    <li>Artists</li>
                </ul>
            </div>
        </div>
        <div class="head-right-container">
            <?php
            if (session_status() == PHP_SESSION_NONE) { //checks to see if a session has already been started before starting a new one.
                session_start();
            }
            if (!isset($_SESSION['user'])){
                echo "<div class=\"head-unregistered\">
                        <ul>
                            <a href=\"register.php\"><li>Sign up</li></a>
                            <a href=\"login.php\"><li>Sign in</li></a>
                        </ul>
                    </div>";

            } else {
                echo "<div class=\"head-unregistered\">
                        <ul>
                            <a href=\"register.php\"><li>Sign up</li></a>
                            <a href=\"logout.php\"><li>Sign out</li></a>
                        </ul>
                    </div>";
            }
            ?>
            <div class="head-search">
                <input type="text" placeholder="search">
            </div>
        </div>
    </div>
</body>
</html>
