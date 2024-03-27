<?php
$servername="localhost";
$username="root";
$password="";
$dbname="myweb";

$conn = new mysqli($servername,$username,$password, $dbname);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}else{
    echo "Connected successfully \n";
}

// $sql = "CREATE TABLE IF NOT EXISTS registrations (
//     user_id INT AUTO_INCREMENT PRIMARY KEY,
//     email VARCHAR(255),
//     password VARCHAR(255),
//     admin BOOLEAN
// )";

// if($conn ->query($sql)===TRUE){
//     echo"Table registration'created successfully \n";
// } else{
//     echo "Error creating table:". $conn->error;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['floatingEmail'];
    $password = password_hash($_POST['floatingConfirmPassword'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check_query = "SELECT * FROM registrations WHERE email = '$email'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        // (ui)
        echo "\nEmail already exists!";
    } else {
        // Insert new registration
        $sql = "INSERT INTO registrations (email, password) VALUES ('$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../pages/login.html");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>