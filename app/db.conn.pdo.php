<?php

$conn = new PDO("mysql:host=localhost;dbname=quill", 'quill', 'quill123');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
