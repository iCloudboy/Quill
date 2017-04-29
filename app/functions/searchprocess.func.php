<?php
function tattooSearch()
{
    require "../db.conn.php";
    session_start();

    $searchTerm = filter_has_var(INPUT_POST, 'design-search') ? $_POST['design-search']: null;
    $searchTerm = $conn->real_escape_string($searchTerm);
    $searchTerm = '%' . $searchTerm . '%';

    if (isset($_POST['design-search-submit'])) {  //check if submit button was pressed
        if (!empty($searchTerm)){
            try {
                $sql = 'SELECT * from tattoos WHERE tattooName LIKE ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $searchTerm);
                $stmt->execute();

                if ($stmt) {
                    while ($stmt->fetch()){

                    }
                } else {
                    $_SESSION['search_error'] = "Nothing was returned. Please try again.";
                    print_r($_SESSION['search_error']);
                    //header("Refresh:3; url=../../login.php");
                    exit();
                }

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            $_SESSION['search_error'] = "The search button was not pressed. Please try again.";
            print_r($_SESSION['search_error']);
            //header("Refresh:3; url=../../login.php");
            exit();
        }
    } else {
        $_SESSION['search_error'] = "The search button was not pressed. Please try again.";
        print_r($_SESSION['search_error']);
        //header("Refresh:3; url=../../login.php");
        exit();
    }
}
