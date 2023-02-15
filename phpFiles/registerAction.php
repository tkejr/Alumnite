<?php
	include 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$name = $_POST['myName'];
		$username=$_POST['myEmail'];
		$pass=$_POST['myPass'];
		$uniV=$_POST['upldUni'];

        
        $sqli="Select * from userInfo where Email='$username'";
		$result=mysqli_query($conn,$sqli);	
		$exists=mysqli_num_rows($result);
			$table_email="";
			$table_pass="";
			
			if($exists>0)
			{    
                //id found login 
				echo "3";
			}
			else
			{ 

                $sql = "INSERT INTO userInfo(Email,Password, Name, Major, GradDate, PhoneNo, Coins, University) values('$username','$pass', '$name', '', '', '', '5', '$uniV')";

                if(mysqli_query($conn,$sql))
                {
                    $_SESSION["Email"] = $username;    //Session started
                    $_SESSION["Uni"] = $uniV;    //Session started
                    echo "1";
                }
                else
                {
                    echo "2";
                    // echo mysqli_error($conn);
                }
            }

                
        mysqli_close($conn);
	}
