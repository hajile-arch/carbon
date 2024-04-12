<?php
// Include your database connection file here
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

// Check if event ID is provided in the URL
if (isset($_GET['id'])) {
    $title = $_GET['id'];

    // Prepare SQL statement to delete the event
    $sql = "DELETE FROM events WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $title);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Event deleted successfully!";
        sleep(2);
        header("Location:admin_event.php");
    } else {
        echo "Error deleting event: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Event ID not provided.";
}

// Close database connection
$conn->close();
?>
