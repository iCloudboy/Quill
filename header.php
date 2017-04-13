    <div class="head-container">
        <div class="head-left-container">
            <div class="head-logo">
                <h1>QUILL</h1>
            </div>
            <div class="head-links">
                <ul>
                    <a href="index.php"><li class="head-active">Home</li></a>
                    <li>Designs</li>
                    <li>Artists</li>
                </ul>
            </div>
        </div>

            <?php

            require "./app/functions/retrievepicture.func.php";
            if (session_status() == PHP_SESSION_NONE) { //checks to see if a session has already been started before starting a new one.
                session_start();
            }
            if (!isset($_SESSION['user'])){
                echo "
                    <div class=\"head-right-container\">
                        <div class=\"head-unregistered\">
                            <ul>
                                <a href=\"register.php\"><li>Sign up</li></a>
                                <a href=\"login.php\"><li>Sign in</li></a>
                            </ul>
                        </div>
                        <div class=\"head-search\">
                            <input type=\"text\" placeholder=\"search\">
                        </div>
                    </div>";

            } else {
                echo "
                      <div class='head-right-container'>
                          <div class=\"head-registered\">
                            <ul>
                                <a href=\"register.php\"><li><img class='header-notification' src='./resources/assets/img/notification.png'></li></a>
                                
                                <li>";
                                    if (empty(retrievePicture()) === false){
                                        //echo 'hi';
                                        echo '<img class="header-image" src=./' . retrievePicture(). ' alt=' . retrieveForename() . '\'s profile picture\">';
                                    } else {
                                        echo "what";
                                    }
                echo "            </li>
                                
                            </ul>    
                            <div class='header-image-menu'>
                                    <ul>
                                        <a href='profile.php'><li>My Profile</li></a>
                                        <a href='settings.php'><li>Account Settings</li></a>
                                        <a href='logout.php'><li>Logout</li></a>
                                    </ul>
                            </div>
                          </div>
                          <div class=\"head-search\">
                                <input type=\"text\" placeholder=\"search\">
                          </div>
                      </div>
                      ";
            }
            ?>
    </div>

