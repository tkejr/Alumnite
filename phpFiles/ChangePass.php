<?php
session_start();
include 'connection.php';
include 'findAndSetUser.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


	$username = $_SESSION['Email'];
	$oldPass = $_POST['myProfOldPass'];
	$newPass = $_POST['myProfNewPass'];

	// $oldPass="12345678";
	// $newPass="321";

	$sqli = "Select * from userinfo where Email='$username'";
	$result = mysqli_query($conn, $sqli);
	$exists = mysqli_num_rows($result); //it checks that the username exsists or not
	$table_email = "";
	$table_pass = "";

	if ($exists > 0) //checks are there any existing rows
	{
		while ($row = mysqli_fetch_assoc($result)) //shows all rows from result
		{
			$table_email = $row['Email']; //"Email is the variable in our data base"
			$table_pass = $row['Password'];

			if (($username == $table_email) && ($oldPass == $table_pass)) {
				$sql = "UPDATE userinfo SET Password='$newPass' WHERE Email='$username' ";

				if (mysqli_query($conn, $sql)) {
					echo findAndSetCurrentUser($username);
				} else {
					echo "0"; //Error updating
				}
			} else {
				echo "2"; //wrong pass
			}
		}
	} else {
		echo "3"; //id not found
	}
}
