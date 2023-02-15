<?php
	session_start();
	include 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$id = $_SESSION['ID'];
		$name = $_POST['myProfName'];
		$email = $_POST['myProfEmail'];
		$major = $_POST['myProfMajor'];
		$gradDate = $_POST['myProfGrad'];
		$phoneNo = $_POST['myProfPhone'];
		$uni = $_POST['myProfUni'];

		// $name = "Lakshay Goyal";
		// $email = "sdkbmnsdkj";
		// $major = "Try";
		// $gradDate = "20012";
		// $phoneNo = "12345";


		$sql = "UPDATE userInfo SET Email='$email', Name='$name', Major='$major', GradDate='$gradDate', PhoneNo='$phoneNo', University='$uni' WHERE ID='$id' ";

		if (mysqli_query($conn, $sql)) {
		    echo "0";
		    $_SESSION['Email'] = $email;
		    $_SESSION['Uni'] = $uni;
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);

	}
		// else{
	// 	echo "4";//internal error
	// }

?>