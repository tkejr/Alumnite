<?php

    session_start();
    include 'phpFiles/connection.php';
//    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $quesId = $_POST['linkedQuesId'];
        $ans = $_POST['commentTA'];
        $email = $_SESSION['Email'];
        
//        $quesId = "6";
//        $ans = "This is my test answ";
//        $email = $_SESSION['Email'];

        $sql = "INSERT INTO Answers (Linked_quesId, Answer, AnsweredBy) VALUES ('$quesId', '$ans', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "0";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);

//    }

?>