<?php

session_start();
include 'phpFiles/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$title = $_POST['titleQuestion'];
	$description = $_POST['descQuestion'];
	$subject = $_POST['subjQuestion'];
	$university = $_POST['uniQuestion'];
	$userEmail = $_SESSION['Email'];

	//        $title = "hi";
	//		$description = "A quick brown fox jumps over the lazy dog.";
	//		$subject = "my test subject";
	//		$university = "My Uni";
	//        $userEmail = "MyTest@email.com";


	$sql = "INSERT INTO Questions (Question, Description, Class_name, AskedBy, University) VALUES ('$title', '$description', '$subject', '$userEmail', '$university')";

	if (mysqli_query($conn, $sql)) {
		echo "0";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
}
