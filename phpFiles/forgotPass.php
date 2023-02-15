<?php
include 'connection.php';
if (isset($_POST['myEmail'])) {
    $to = $_POST['myEmail'];
    $subject = "Forgot Password";
    $from = "support@alumnite.co";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= "From: <" . $from . ">";

    $sqli = "Select * from userInfo where Email='$to'";
    $result = mysqli_query($conn, $sqli);
    $exists = mysqli_num_rows($result); //it checks that the username exsists or not
    $pass = "";

    if ($exists > 0) //checks are there any existing rows
    {
        while ($row = mysqli_fetch_assoc($result)) //shows all rows from result
        {
            $pass = $row["Password"];
        }
    } else {
        echo "Id Not Found"; //id not found
    }


    $mainMess = "";
    if (empty($pass)) {
        $mainMess = "You are registered with us via <b>google<b>. Please click the SIGN IN with GOOGLE button.";
    } else {
        $mainMess = "Your password is :- <b>" . $pass . "</b>.";
    }


    $message = "
    <html>
        <head>
        <title>Forgot Password</title>
        </head>
        
        <body>
            <p>" . $mainMess . "</p>
            
            <p>If you did not request for a password recovery, please delete this email.</p>
        </body>
    </html>
    ";



    if (mail($to, $subject, $message, $headers)) {
        echo "1";
    } else {
        echo "2";
    }
}
