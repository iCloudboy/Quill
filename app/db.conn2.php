<?php

$conn = mysqli_connect('localhost', 'unn_w13018922', 'gsai8esb', 'unn_w13018922');
if (mysqli_connect_errno()) {
    echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
    mysqli_close($conn);
}
mysqli_set_charset($conn,"utf8");
