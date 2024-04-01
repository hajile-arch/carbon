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
$sql = "CREATE TABLE IF NOT EXISTS profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    commuting_method VARCHAR(255),
    energy_source VARCHAR(255),
    dietary_preference VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$commutingMethod = $_POST['commuting-method'];
$energySource = $_POST['energy-source'];
$dietaryPreference = $_POST['dietary-preference'];


// Insert data into database
$sql = "UPDATE profiles SET name='$name', username='$username', email='$email', phone='$phone', commuting_method='$commutingMethod', energy_source='$energySource', dietary_preference='$dietaryPreference' WHERE id=1"; // Adjust WHERE clause as needed

if ($conn->query($sql) === TRUE) {
    echo '<div class="w-75 d-flex shadow border">';
    // left
    echo '<div class="w-50 d-flex justify-content-center align-items-center">';
    echo '<img src="../img/profile/pfp.svg" alt="pfp"/>';
    echo '</div>';
    // right
    echo '<div class="w-50 d-flex justify-content-center align-items-center bg-secondary-subtle">';
    echo '<form action="../api/profile-post.php" method="post" id="user-data" class="p-5 w-100 h-100 gap-4 form-floating d-flex flex-column justify-content-center align-items-center">';
    echo '<div class="d-flex flex-column gap-2 w-100">';
    echo '<div class="form-floating">';
    echo '<input type="text" class="form-control bg-white border-0" id="name" name="name" value="'.$name.'" disabled />';
    echo '<label for="na">Name</label>';
    echo '</div>';
    echo '<div class="form-floating">';
    echo '<input type="text" class="form-control bg-white border-0" id="username" name="username" value="'.$username.'" disabled />';
    echo '<label for="username">Username</label>';
    echo '</div>';
    echo '<div class="form-floating">';
    echo '<input type="email" class="form-control bg-white border-0" id="email" name="email" value="'.$email.'" disabled />';
    echo '<label for="email">Email</label>';
    echo '</div>';
    echo '<div class="form-floating">';
    echo '<input type="tel" class="form-control bg-white border-0" id="phone" value="'.$phone.'" name="phone" disabled />';
    echo '<label for="phone">Phone number</label>';
    echo '</div>';
    echo '<div class="form-floating">';
    echo '<input type="text" class="form-control bg-white border-0" id="commuting-method" value="'.$commutingMethod.'" name="commuting-method" disabled />';
    echo '<label for="commuting-method">Commuting method</label>';
    echo '</div>';
    echo '<div class="form-floating">';
    echo '<input type="text" class="form-control bg-white border-0" id="energy-source" value="'.$energySource.'" name="energy-source" disabled />';
    echo '<label for="energy-source">Energy source</label>';
    echo '</div>';
    echo '<div class="form-floating">';
    echo '<input type="text" class="form-control bg-white border-0" id="dietary-preference" name="dietary-preference" value="'.$dietaryPreference.'" disabled />';
    echo '<label for="dietary-preference">Dietary preference</label>';
    echo '</div>';
    echo '</div>';
    echo '<button class="btn btn-dark w-100" type="button" onclick="editProfile(this)">Edit profile</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Error updating profile: " . $conn->error;
}

$conn->close();
?>
