<?php
// Include your database connection file here
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !$_SESSION["admin"]) {
    // Redirect unauthorized users to the login page or display an error message
    header("location: login.php");
    exit;
}

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

// Query to fetch all users from the database
$sql = "SELECT email AND password FROM registrations";
$result = $conn->query($sql);

// Check if users exist
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
</head>
<body>
    <h2>User Accounts</h2>
    <!-- Add user registration form here -->
    <h3>Add New User</h3>
    <form action="register_user.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Register">
    </form>

    <!-- Add user deletion form here -->
    <h3>Delete User</h3>
    <form action="delete_user.php" method="post">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id"><br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
