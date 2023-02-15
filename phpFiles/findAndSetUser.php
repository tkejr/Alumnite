<?php
session_start();
function findAndSetCurrentUser($email): String
{
    include 'connection.php';
    $sqli = "Select * from userInfo where Email='$email'";
    $result = mysqli_query($conn, $sqli);
    $exists = mysqli_num_rows($result);

    if ($exists > 0) {
        //id found login 
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["Email"] = $row['Email'];
            $_SESSION["Uni"] = $row['University'];
            $_SESSION["ID"] = $row['ID'];
            return "1";
        }
    }
    return "Some error occured (Id not found)";
}
