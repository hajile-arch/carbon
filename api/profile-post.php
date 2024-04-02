<?php
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
// $sql = "CREATE TABLE IF NOT EXISTS profiles (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     username VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     phone VARCHAR(20),
//     commuting_method VARCHAR(255),
//     energy_source VARCHAR(255),
//     dietary_preference VARCHAR(255)
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$commutingMethod = $_POST['commuting-method'];
$energySource = $_POST['energy-source'];
$dietaryPreference = $_POST['dietary-preference'];

$sql_check_user = "SELECT * FROM profiles WHERE email='$email'";
$result_check_user = $conn->query($sql_check_user);

if ($result_check_user->num_rows > 0) {
    // User already exists, perform an update
    $sql = "UPDATE profiles SET name='$name', email='$email',username='$username', phone='$phone', commuting_method='$commutingMethod', energy_source='$energySource', dietary_preference='$dietaryPreference' WHERE email='$email'";
} else {
    // User does not exist, perform an insert
    $sql = "INSERT INTO profiles (name, username, email, phone, commuting_method, energy_source, dietary_preference) VALUES ('$name', '$username', '$email', '$phone', '$commutingMethod', '$energySource', '$dietaryPreference')";
}



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: ../pages/profile.php");
    exit;