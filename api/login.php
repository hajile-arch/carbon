<?php
$servername = "localhost"; // replace with your database host
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "myweb"; // replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and password from the form
    $email = $_POST['floatingEmail'];
    $password = $_POST['floatingPassword'];

    // Prepare a SELECT query to retrieve the hashed password based on the provided email
    $stmt = $conn->prepare("SELECT password FROM registrations WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row was returned (email exists)
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_hashed_password = $row['password']; // Retrieve the hashed password from the database

        // Verify if the provided password matches the stored hashed password
        if (password_verify($password, $stored_hashed_password)) {
            // Passwords match, authentication successful
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            
            header("Location: ../pages/home.php");
            // Redirect to welcome page
            exit;
        } else {
            // Passwords do not match, authentication failed (ui)
            echo "Invalid email or password";
        }
    } else {
        // Email not found in the database (ui)
        echo "Invalid email or password";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
