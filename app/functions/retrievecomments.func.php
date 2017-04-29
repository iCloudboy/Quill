<?php

$tattooID = $_SESSION['tattooID'];

try {
    include './app/db.conn.php';	// make db connection
    $sql = "SELECT picture, comment, forename, surname, commentDate, u.userID FROM comments c
                                    INNER JOIN users u 
                                    ON c.userID = u.userID
                                    WHERE c.tattooID = ?
                                    ORDER BY c.commentID ASC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tattooID);
    $stmt->execute();
    $stmt->bind_result($profilepicture, $comment, $forename, $surname, $date, $userID);

    while ($row = $stmt->fetch()){

        $formatteddate = date("jS F Y", strtotime($date));
        echo '<div class="tattoo-individual-comment-wrapper">
                                        <div class="tattoo-comment-image">
                                            <img src="' . $profilepicture . '">
                                        </div>
                                        <div class="tattoo-individual-comment-details-wrapper">
                                            <div class="tattoo-individual-comment-name">
                                                <a href="profile.php?userID=' . $userID . '"><p class="tattoo-comment-name-highlight">'. $forename . ' ' . $surname . '</p></a>
                                                <p>' . $formatteddate . '</p>
                                            </div>
                                            <div class="tattoo-individual-comment">
                                                <p>' . $comment . '</p>
                                            </div>
                                        </div>
                                    </div>';
    }
} catch (PDOException $e) {
    echo $stmt . '<br>' . $e->getMessage();
}
?>
