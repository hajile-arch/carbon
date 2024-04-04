<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION["email"];
$existingRecordQuery = "SELECT date FROM home WHERE email LIKE '$email' ;";
$result = $conn->prepare($existingRecordQuery);
$result->execute();
$result->store_result();
$result->bind_result($date);
$result->fetch();

$currentDate = date("Y-m-d");
$alreadyEntered = false;

if ($result && $result->num_rows > 0) {
    $alreadyEntered = true;
}

echo json_encode($alreadyEntered);

?>