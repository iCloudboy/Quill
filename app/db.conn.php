<?php

$conn = mysqli_connect('localhost','quill','quill123','quill');
if (mysqli_connect_errno()) {
    echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
    mysqli_close($conn);
}
mysqli_set_charset($conn,"utf8");
