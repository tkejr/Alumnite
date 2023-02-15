<?php
include 'connection.php';

session_start();
$username = $_SESSION['Email'];
$counter = 0;

function fetchCoins()
{

	global $username, $conn, $counter;

	$sqli = "Select * from userInfo where Email='$username'";
	$result = mysqli_query($conn, $sqli);
	$exists = mysqli_num_rows($result); //it checks that the username exsists or not

	$coins = "";


	if ($exists > 0) //checks are there any existing rows
	{
		while ($row = mysqli_fetch_assoc($result)) //shows all rows from result
		{
			$coins = $row['Coins'];
		}
	} else {
		echo "Id Not found";
	}

	$counter++;
	return $coins;
}

function addCoins($addCoins, $email)
{

	global $conn, $username;

	$username = $email;

	$myCoin = fetchCoins();
	$coins = (int)$myCoin + $addCoins;
	$mess = "";

	$sql = "UPDATE userInfo SET Coins='$coins' WHERE Email='$username' ";

	if (mysqli_query($conn, $sql)) {
		$mess = "Success";
	} else {
		$mess = "Error updating record: " . mysqli_error($conn);
	}

	return $mess;
}

function deleteCoins($delCoins)
{
	global $conn, $username, $counter;

	$myCoin = (int)fetchCoins();
	$mess = "";

	// echo $myCoin."<br>";

	if ($myCoin >= $delCoins) {

		$myCoin = $myCoin - $delCoins;

		$sql = "UPDATE userInfo SET Coins='$myCoin' WHERE Email='$username' ";

		if (mysqli_query($conn, $sql)) {
			$mess = "Success";
		} else {
			$mess = "Error updating record: " . mysqli_error($conn);
		}
	} else {
		$mess = "no";
	}

	// echo $counter;
	return $mess;
}

// addCoins(1000);
// echo fetchCoins();
// echo deleteCoins(2);

if ($_POST['action'] == 'call_this') {
	echo deleteCoins(2);
}


// mysqli_close($conn);
