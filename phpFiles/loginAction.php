<?php
	session_start();
	include 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$username=$_POST['myEmail'];
		$pass=$_POST['myPass'];

		$sqli="Select * from userInfo where Email='$username'";
		$result=mysqli_query($conn,$sqli);	
		$exists=mysqli_num_rows($result); //it checks that the username exsists or not
			$table_email="";
			$table_pass="";
			
			if($exists>0) //checks are there any existing rows
			{
				while($row = mysqli_fetch_assoc($result))//shows all rows from result
				{
					$table_email=$row['Email'];//"Email is the variable in our data base"
					$table_pass=$row['Password'];
				
					if(($username==$table_email) && ($pass==$table_pass)){
						$_SESSION['Email'] = "$username";    //Session started
						$_SESSION["Uni"] = $row['University'];
						$_SESSION["isLoggedIn"] = true;
						echo "1";//success
					}
					else{
				 		echo "2";//wrong pass
					}
				}
			}
			else
			{ 
				echo "3";//id not found
			}	
	}else{
		echo "4";//internal error
	}

	

?>