<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_SESSION["email"];
echo $email;

// Prepare and execute SQL query to select user data based on email
$sql = "SELECT * FROM profiles WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();


$monthlyElectricBill = $_POST['monthlyElectricBill'];
$monthlyGasBill = $_POST['monthlyGasBill'];
$monthlyOilBill = $_POST['monthlyOilBill'];
$totalMileage = $_POST['totalMileage'];
$totalYear = $_POST['totalYear'];
$numberOfFlights = $_POST['numberOfFlights'];
$doRecycleNewspaper = $_POST['doRecycleNewspaper'];
$doRecycleAluminiumAndTin = $_POST['doRecycleAluminiumAndTin'];

$sql = "INSERT INTO home (email,monthlyElectricBill, monthlyGasBill, monthlyOilBill, totalMileage, totalYear, numberOfFlights, doRecycleNewspaper,doRecycleAluminiumAndTin) VALUES ('$email','$monthlyElectricBill', '$monthlyGasBill', '$monthlyOilBill', '$totalMileage', '$totalYear', '$numberOfFlights', '$doRecycleNewspaper','$doRecycleNewspaper')";


$sql = "CREATE TABLE IF NOT EXISTS home (
    email VARCHAR(255) NOT NULL, 
    monthlyElectricBill INTEGER NOT NULL,
    monthlyGasBill INTEGER NOT NULL,
    monthlyOilBill INTEGER NOT NULL,
    totalMileage INTEGER NOT NULL,
    totalYear INTEGER NOT NULL,
    numberOfFlights INTEGER NOT NULL,
    doRecycleNewspaper BOOLEAN NOT NULL,
    doRecycleAluminiumAndTin BOOLEAN NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "\nNew record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

