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
$currentDate = date("Y-m-d");

$existingRecordQuery = "SELECT date FROM home WHERE email = ? AND date = ?";
$stmt = $conn->prepare($existingRecordQuery);
$stmt->bind_param("ss", $email, $currentDate);
$stmt->execute();
$stmt->store_result();

$alreadyEntered = false;
if ($stmt->num_rows == 1) {
    $alreadyEntered = true;
}

echo json_encode($alreadyEntered);

$stmt->close();
$conn->close();
?>
