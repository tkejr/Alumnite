<?php

// mysql: //b9dbb7bf494eea:c56f3c72@us-cdbr-east-06.cleardb.net/heroku_509f154ed7ef340?reconnect=true

$servername = "us-cdbr-east-06.cleardb.net";
$username = "b9dbb7bf494eea";
$password = "c56f3c72";
$databaseName = "heroku_509f154ed7ef340";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $databaseName = "alumnite";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
