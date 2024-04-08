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
$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>ID</th>";
    echo "<th scope='col'>Email</th>";
    echo "<th scope='col'>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<th scope='row'>".$row["user_id"]."</th>";
        echo "<td>".$row["email"]."</td>";
        echo "<td class='d-flex gap-2'>";
        echo "<a href='_edit_user.php?email=".$row["email"]."' class='link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Edit</a>";
        echo "<a href='_delete_user.php?email=".$row["email"]."' class='link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>