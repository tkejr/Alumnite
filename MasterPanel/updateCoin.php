<?php 
include '../phpFiles/connection.php';

    $id = $_GET['id'];
    $val = $_GET['val'];


    $sql = "UPDATE userinfo SET Coins='$val' WHERE ID='$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "Successfully Updated";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
