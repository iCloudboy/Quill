<?php

$conn = mysqli_connect('localhost','root','root','individual');
if (mysqli_connect_errno()) {
    echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
    mysqli_close($conn);
}
mysqli_set_charset($conn,"utf8");
