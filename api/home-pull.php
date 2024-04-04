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

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    // Check if a record for the current date and email already exists
    $currentDate = date("Y-m-d");
    $existingRecordQuery = "SELECT * FROM home WHERE email = '$email' AND DATE(date) = '$currentDate'";
    $result = $conn->query($existingRecordQuery);

    $alreadyEntered = false;

    if ($result && $result->num_rows > 0) {
        // If a record already exists for today, set alreadyEntered to true
        $alreadyEntered = true;
    }
    echo json_encode($alreadyEntered);

} else {
    echo "Fail to pass alreadyEntered value";
}

// Pass the value to the javascript on load

// echo $alreadyEntered;
?>