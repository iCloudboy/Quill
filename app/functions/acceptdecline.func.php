<?php
    session_start();
    require '../db.conn.php';

    $bookingID = $_POST['bookingID'];

    if (isset($_POST['accept'])){
        try {
            $sql = "UPDATE booking SET accepted = 1 WHERE bookingID = $bookingID";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if($stmt){
                header("Location:../../requestaccepted.php");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else if (isset($_POST['decline'])){
        try {
            $sql = "UPDATE booking SET accepted = 0 WHERE bookingID = $bookingID";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if($stmt){
                header("Location:../../requestdeclined.php");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {

    }
