<?php
//    error_reporting(0);	
session_start();
include 'phpFiles/coin.php';


$quizLink = $_GET["val"];

$subject = $_POST['subject'];
$prof = $_POST['prof'];
$year = $_POST['yr'];
$myName = $_POST['fileName'];
$desc = $_POST['desc'];
$classLvl = $_POST['classLvl'];
$category = $_POST['upldCategory'];

$university = $_SESSION["Uni"];
$userName = $_SESSION["Email"];

if ($quizLink == "no") {
	$target_dir = "uploadedPDF/";
	$uploadOk = 10;

	$file_name = basename($_FILES["myInputfFile"]["name"]);
	$file_ext = strtolower(pathinfo($target_dir . $file_name, PATHINFO_EXTENSION));
	$random = uniqid();

	$extensions = array("pdf", "zip", "epub", "xlsx", "ppt", "mp4", "word", "py", "java", "txt", "jpg", "png", "docx");

	// Allow certain file formats
	if (in_array($file_ext, $extensions) === false) {
		$uploadOk = 0; //wrong extension
	}

	if (!isset($_SESSION['Email'])) {
		$uploadOk = 1; //Not logged in
	}

	//change file name
	$title = $myName . "." . $file_ext;
	// uploadedPDF/12345-fileName.pdf
	$target_file = $target_dir . $random . "-" . $title;

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk != 10) {
		echo $uploadOk; //something wrong
	} else {
		if (move_uploaded_file($_FILES["myInputfFile"]["tmp_name"], $target_file)) {
			echo "The file <b>" . $file_name . "</b> has been uploaded.<br> It will be shown live and the coins will be awarded within a few hours after approval.";
			updateDB();
		} else {
			echo "2"; //File upload error
		}
	}
} else {
	$target_file = $_POST["myInputfFile"];
	$title = $myName;
	echo "The link <b>" . $title . "</b> has been uploaded.<br> It will be shown live and the coins will be awarded within a few hours after approval.";
	updateDB();
}

function updateDB()
{

	global $subject, $year, $prof, $title, $desc, $target_file, $userName, $classLvl, $category, $university;
	include "phpFiles/connection.php";

	$table = "PDFs";


	$sql = "INSERT INTO $table (Subject, Year, Prof, UploadedBy, Name, Description, pathName, Pending, ClassLvl, Category, University) VALUES ('$subject', '$year', '$prof', '$userName', '$title', '$desc', '$target_file', 'Yes', '$classLvl', '$category', '$university')";

	mysqli_query($conn, $sql);

	mysqli_close($conn);
}
