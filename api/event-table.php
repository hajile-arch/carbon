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

// Query to fetch all events from the database
$sql = "SELECT title, date, time, location, organiser FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>Title</th>";
    echo "<th scope='col'>Date</th>";
    echo "<th scope='col'>Time</th>";
    echo "<th scope='col'>Location</th>";
    echo "<th scope='col'>Organiser</th>";
    echo "<th scope='col'>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['organiser'] . "</td>";
        echo "<td>";
        echo "<a href='_delete_event.php?id=" . $row['title'] . "' class='link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "<a href='_add_event.php' class='btn btn-outline-dark w-100'>Add new event</a>";
} else {
    echo "0 results";
}

$conn->close();
?>
