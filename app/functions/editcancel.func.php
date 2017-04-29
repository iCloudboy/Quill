<?php
session_start();
require '../db.conn.php';

$bookingID = $_POST['bookingID'];

if (isset($_POST['cancel'])){
    try {
        $sql = "UPDATE booking SET cancelled = 1 WHERE bookingID = $bookingID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if($stmt){
            header("Location:../../bookingcancelled.php");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
