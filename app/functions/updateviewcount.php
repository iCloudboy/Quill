<?php
function updateViewCount(){
    require "app/db.conn.php";

    $tattooID = $_SESSION['tattooID'];

    $sql = "SELECT tattooViews FROM tattoos WHERE tattooID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tattooID);
    $stmt->execute();
    $stmt->bind_result($tattooviews);


    if ($stmt->fetch()){
        $stmt->close();
        $sql2 = "UPDATE tattoos SET tattooViews = tattooViews + 1 WHERE tattooID = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $tattooID);
        $stmt2->execute();
    } else {
        echo "update viewcount failure";
    }
}


