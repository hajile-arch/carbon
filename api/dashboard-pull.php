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

// Fetch the latest record for the user
$latestRecordQuery = "SELECT monthlyElectricBill, monthlyGasBill, monthlyOilBill, 
totalMileage, totalYear, numberOfFlights, recycleNewspaper, recycleAluminiumAndTin, 
date FROM home WHERE email LIKE ? ORDER BY date DESC LIMIT 1";

$stmtLatest = $conn->prepare($latestRecordQuery);
$stmtLatest->bind_param("s", $email);
$stmtLatest->execute();
$resultLatest = $stmtLatest->get_result();

$latestRecord = array();

if ($resultLatest->num_rows == 1) {
    $latestRecord = $resultLatest->fetch_assoc();
} else {
    $latestRecord = "No records found";
}

// Close the statement for the latest record
$stmtLatest->close();

// Fetch all records for the user
$allRecordsQuery = "SELECT monthlyElectricBill, monthlyGasBill, monthlyOilBill, 
totalMileage, totalYear, numberOfFlights, recycleNewspaper, recycleAluminiumAndTin, 
date FROM home WHERE email LIKE ?";

$stmtAll = $conn->prepare($allRecordsQuery);
$stmtAll->bind_param("s", $email);
$stmtAll->execute();
$resultAll = $stmtAll->get_result();

$allRecords = array();

while ($row = $resultAll->fetch_assoc()) {
    $allRecords[] = $row;
}

// Close the statement for all records
$stmtAll->close();

// Close the connection
$conn->close();

// Output the latest record and all records as JSON
echo json_encode(array('latestRecord' => $latestRecord, 'allRecords' => $allRecords));
?>
