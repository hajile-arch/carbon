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

// Query to fetch all users from the database
// TODO: elijah
// $sql = ""; 
// $result = $conn->query($sql);

if (true) { //TODO: elijah
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>Title</th>";
    echo "<th scope='col'>Date</th>";
    echo "<th scope='col'>Time</th>";
    echo "<th scope='col'>Location</th>";
    echo "<th scope='col'>Organizer</th>";
    echo "<th scope='col'>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    $x = 0;
    while ($x != 5) { //TODO: elijah
        $x++;
        echo "<tr>";
        echo "<th scope='row'>$x</th>";
        echo "<td>date $x</td>";
        echo "<td>time $x</td>";
        echo "<td>location $x</td>";
        echo "<td>organizer $x</td>";
        echo "<td>";
        echo "<a href='_delete_event.php?' class='link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Delete</a>";
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