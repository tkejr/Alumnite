<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$username = $_POST['masName'];
	$pass = $_POST['masPass'];

	// $username = "Tanmay";
	// $pass = "Tanmay";

	$validUserNames = array('Admin', 'Lakshay', 'Tanmay');
	$validPasswords = array('Admin', '321', 'Tanmay');

	$success = 0;

	for ($i = 0; $i < count($validUserNames); $i++) {
		if ($username == $validUserNames[$i] && $pass == $validPasswords[$i]) {
			$success++;
			break;
		}
	}

	if ($success > 0) {
		echo "Successfully Logged In";
		$_SESSION['MainAdminLoggedIn'] = $username;
	} else {
		echo "Wrong Username/ Pass";
	}
}
