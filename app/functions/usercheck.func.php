<?php

//this function returns true or false depending on if the user exists or not.
function user_active($userID) {
    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE ")))
}
