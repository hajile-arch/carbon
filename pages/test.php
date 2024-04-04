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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing PHP Variable to JavaScript</title>
</head>
<body>
    <script>
        var myVariable = "<?php echo $myVariable; ?>";
        console.log(myVariable); // Output: Hello from PHP!
    </script>
    <script src="script.js"></script>
</body>
</html>
