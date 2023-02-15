<?php

// $servername = "a2plcpnl0632";
// $username = "beaajjmoaqxf";
// $password = "Alumnite@2020";
// $databaseName = "Alumnite";

// $servername = "localhost";
// $username = "u542442405_alumnite";
// $password = "tanmay28K*";
// $databaseName = "u542442405_Alumnite";

$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "alumnite";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
