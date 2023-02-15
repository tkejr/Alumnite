<?php

	include 'connection.php';

	if($_POST['action'] == 'delete') {

		$id = $_GET["id"];
		$path = $_GET["path"];

		// sql to delete a record
		$sql = "DELETE FROM PDFs WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			// Use unlink() function to delete a file  
			echo "Success";
			

		} else {
		    echo "Error deleting record: " . mysqli_error($conn);
		}

	}
	
?>