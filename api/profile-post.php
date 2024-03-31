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


// Insert data into database
$sql = 'INSERT INTO profiles (name, username, email, phone, commuting_method, energy_source, dietary_preference) VALUES("$name", "$username", "$email", "$phone","$commutingMethod", "$energySource", "$dietaryPreference")'; // Adjust WHERE clause as needed

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo $email;
echo $name;
echo $username;
echo $phone;
echo $commutingMethod;
echo $energySource;
echo $dietaryPreference;