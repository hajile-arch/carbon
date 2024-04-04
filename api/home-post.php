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

// Get the email from session
$email = $_SESSION["email"];

// Retrieve other form data
$monthlyElectricBill = $_POST['monthlyElectricBill'];
$monthlyGasBill = $_POST['monthlyGasBill'];
$monthlyOilBill = $_POST['monthlyOilBill'];
$totalMileage = $_POST['totalMileage'];
$totalYear = $_POST['totalYear'];
$numberOfFlights = $_POST['numberOfFlights'];
$recycleNewspaper = $_POST['recycleNewspaper'];
$recycleAluminiumAndTin = $_POST['recycleAluminiumAndTin'];

// Insert the data into the database
$sql_insert = "INSERT INTO home (email, monthlyElectricBill, monthlyGasBill, monthlyOilBill, totalMileage, totalYear, numberOfFlights, recycleNewspaper, recycleAluminiumAndTin) 
               VALUES ('$email', '$monthlyElectricBill', '$monthlyGasBill', '$monthlyOilBill', '$totalMileage', '$totalYear', '$numberOfFlights', '$recycleNewspaper', '$recycleAluminiumAndTin')";

// Create table if not exists
$sql_create = "CREATE TABLE IF NOT EXISTS home (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    monthlyElectricBill INTEGER NOT NULL,
    monthlyGasBill INTEGER NOT NULL,
    monthlyOilBill INTEGER NOT NULL,
    totalMileage INTEGER NOT NULL,
    totalYear INTEGER NOT NULL,
    numberOfFlights INTEGER NOT NULL,
    recycleNewspaper VARCHAR(5) NOT NULL,
    recycleAluminiumAndTin VARCHAR(5) NOT NULL,
    date DATE DEFAULT CURRENT_DATE
)";

// Execute the queries
if ($conn->query($sql_create) === TRUE) {
    if ($conn->query($sql_insert) === TRUE) {
        // If insertion is successful, redirect to dashboard
        header("Location: ../pages/dashboard.html");
        exit;
    } else {
        echo "Error inserting record: " . $conn->error;
    }
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>