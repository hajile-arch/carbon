<?php
$servername="localhost";
$username="root";
$password="";
$dbname="myweb";

$conn = new mysqli($servername,$username,$password, $dbname);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}else{
    echo "Connected successfully";
}

$sql = "CREATE TABLE IF NOT EXISTS registrations (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    password VARCHAR(255),
    admin BOOLEAN
)";

if($conn ->query($sql)===TRUE){
    echo"Table registration'created successfully";
} else{
    echo "Error creating table:". $conn->error;
}

$email=$_POST['floatingEmail'];
$password=password_hash($_POST['floatingConfirmPassword'], PASSWORD_DEFAULT);
$sql="INSERT INTO registrations (email, password) VALUES('$email','$password')";

if ($conn -> query($sql)===TRUE){
    echo"Registration successfully!";
} else {
    echo"Error: ".$sql . "<br>" . $conn->error;
}

$conn->close();
?>