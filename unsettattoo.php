<?php
session_start();
unset($_SESSION['tattoo']);
header("location: index.php");
