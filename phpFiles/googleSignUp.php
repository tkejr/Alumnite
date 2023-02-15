<?php
	session_start();
	include 'connection.php';
                
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $uniV=$_POST['gooupldUni'];
//        $pass=$_GET['gooPass'];
        $name = $_POST['gooName'];
        $username=$_POST['gooEmail'];

        if(empty($uniV) || empty($name) || empty($username)){
            echo "Variables Empty: Error ";
        }
        else{
            $sql = "INSERT INTO userInfo(Email,Password, Name, Major, GradDate, PhoneNo, Coins, University) values('$username','', '$name', '', '', '', '5', '$uniV')";

            if(mysqli_query($conn,$sql))
            {
                $_SESSION["Email"] = $username;
                $_SESSION["Uni"] = $uniV;
                echo "1";
            }
            else
            {
                echo "2";
                // echo mysqli_error($conn);
            }
        }
   }
    else{
        $username=$_GET['gooEmail'];

        $sqli="Select * from userInfo where Email='$username'";
		$result=mysqli_query($conn,$sqli);	
		$exists=mysqli_num_rows($result);
        
			if($exists>0)
			{    
                //id found login 
				while($row = mysqli_fetch_assoc($result))
				{
                    $_SESSION["Email"] = $row['Email'];
                    $_SESSION["Uni"] = $row['University'];
                    echo "1";
				}
			}
    }

?>