<?php
include 'connection.php';
include 'findAndSetUser.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$id = $_SESSION['ID'];
	$email = $_SESSION['Email'];
	$name = $_POST['myProfName'];
	$major = $_POST['myProfMajor'];
	$gradDate = $_POST['myProfGrad'];
	$phoneNo = $_POST['myProfPhone'];
	$uni = $_POST['myProfUni'];

	// $name = "Lakshay Goyal";
	// $email = "sdkbmnsdkj";
	// $major = "Try";
	// $gradDate = "20012";
	// $phoneNo = "12345";


	$sql = "UPDATE userinfo SET Email='$email', Name='$name', Major='$major', GradDate='$gradDate', PhoneNo='$phoneNo', University='$uni' WHERE ID='$id' ";

	if (mysqli_query($conn, $sql)) {

		echo findAndSetCurrentUser($email);
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
}
		// else{
	// 	echo "4";//internal error
	// }
