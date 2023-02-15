<?php
    include 'connection.php';
//    if(isset($_POST['myEmail'])) {
//        $email_to = $_POST['myEmail'];
//
//        $email_subject = "Forgot Password";
//        $email_from = "support@alumnite.co";
//
//        function clean_string($string) {
//        $bad = array("content-type","bcc:","to:","cc:","href");
//        return str_replace($bad,"",$string);
//        }
//
//
//        $sqli="Select * from userInfo where Email='$email_to'";
//        $result=mysqli_query($conn,$sqli);	
//        $exists=mysqli_num_rows($result); //it checks that the username exsists or not
//            $pass = "";
//
//            if($exists>0) //checks are there any existing rows
//            {
//                while($row = mysqli_fetch_assoc($result))//shows all rows from result
//                {
//                    $pass = $row["Password"];
//                }
//            }
//            else
//            { 
//                echo "Id Not Found";//id not found
//            }	
//
//
//
//        if(empty($pass)){
//            $email_message = "You are registered with us via google. Please click the SIGN IN with GOOGLE button.\n If you did not request for a password recovery, please delete this email.";
//        }else{
//            $email_message = "Your password is :- ".$pass."\n If you did not request for a password recovery, please delete this email.";
//        }
//        // create email headers
//        $headers = 'From: '.$email_from."\r\n".
//        'Reply-To: '.$email_from."\r\n" .
//        'X-Mailer: PHP/' . phpversion();
//
//        mail($email_to, $email_subject, $email_message, $headers);
//
//        echo "We have sent you password on your <b>email</b>.";
//    }


    //----------------Some fixed things---------------
        $to = "lakshaydcoder@gmail.com";
        $subject = "Forgot Password";
        $from = "support@alumnite.co";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= "From: <".$from.">";

    //----------------------------------------------------

        $sqli="Select * from userInfo where Email='$to'";
        $result=mysqli_query($conn,$sqli);	
        $exists=mysqli_num_rows($result); //it checks that the username exsists or not
            $pass = "";

            if($exists>0) //checks are there any existing rows
            {
                while($row = mysqli_fetch_assoc($result))//shows all rows from result
                {
                    $pass = $row["Password"];
                }
            }
            else
            { 
                echo "Id Not Found";//id not found
            }	

        
        $mainMess = "";
        if(empty($pass)){
            $mainMess = "You are registered with us via <b>google<b>. Please click the SIGN IN with GOOGLE button.";
        }else{
            $mainMess = "Your password is :- <b>".$pass."</b>.";
        }


    $message = "
    <html>
        <head>
        <title>Forgot Password</title>
        </head>
        
        <body>
            <p>".$mainMess."</p>
            
            <p>If you did not request for a password recovery, please delete this email.</p>
        </body>
    </html>
    ";

    

    if(mail($to,$subject,$message,$headers)){
        echo "1";
    }
    else{
        echo "2";
    }


?>