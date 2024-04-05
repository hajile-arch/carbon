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
$existingRecordQuery = "SELECT monthlyElectricBill, monthlyGasBill, monthlyOilBill, totalMileage, totalYear, numberOfFlights, recycleNewspaper, recycleAluminiumAndTin FROM home WHERE email LIKE ? AND date LIKE ?";
$stmt = $conn->prepare($existingRecordQuery);
$stmt->bind_param("ss", $email, $currentDate);
$stmt->execute();
$result = $stmt->get_result();

$response = array();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $response['monthlyElectricBill'] = $row['monthlyElectricBill'];
    $response['monthlyGasBill'] = $row['monthlyGasBill'];
    $response['monthlyOilBill'] = $row['monthlyOilBill'];
    $response['totalMileage'] = $row['totalMileage'];
    $response['totalYear'] = $row['totalYear'];
    $response['numberOfFlights'] = $row['numberOfFlights'];
    $response['recycleNewspaper'] = $row['recycleNewspaper'];
    $response['recycleAluminiumAndTin'] = $row['recycleAluminiumAndTin'];
} else {
    // Handle case where no data is found for the user
    // You can either set default values or display an error message
    $response['error'] = "No data found for the user";
}

// Close the statement
$stmt->close();

// Output the response as JSON
echo json_encode($response);
?>
