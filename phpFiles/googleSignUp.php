<?php
session_start();
include 'connection.php';
include 'findAndSetUser.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $uniV = $_POST['gooupldUni'];
    //        $pass=$_GET['gooPass'];
    $name = $_POST['gooName'];
    $username = $_POST['gooEmail'];

    if (empty($uniV) || empty($name) || empty($username)) {
        echo "Variables Empty: Error ";
    } else {
        $sql = "INSERT INTO userinfo(Email,Password, Name, Major, GradDate, PhoneNo, Coins, University) values('$username','', '$name', '', '', '', '5', '$uniV')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION["Email"] = $username;
            $_SESSION["Uni"] = $uniV;

            echo findAndSetCurrentUser($username);
        } else {
            echo "2";
            // echo mysqli_error($conn);
        }
    }
} else {
    $username = $_GET['gooEmail'];
    echo findAndSetCurrentUser($username);
}
