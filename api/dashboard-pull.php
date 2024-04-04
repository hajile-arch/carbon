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

$email = $_SESSION["email"];
// echo $email;

// Prepare and execute SQL query to select user data based on email
$sql = "SELECT * FROM home WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if data is found
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $username = $row['username'];
    $phone = $row['phone'];
    $commutingMethod = $row['commuting_method'];
    $energySource = $row['energy_source'];
    $dietaryPreference = $row['dietary_preference'];
} else {
    // Handle case where no data is found for the user
    // You can either set default values or display an error message
    $name = '';
    $username = '';
    $phone = '';
    $commutingMethod = '';
    $energySource = '';
    $dietaryPreference = '';
}

// Close the statement
$stmt->close();


echo '<div class="d-flex gap-3 h-100">';
// left
echo '<div class="d-flex flex-column gap-3 w-50 h-100">';
// top left
echo '<div class="border p-5 rounded d-flex flex-column justify-content-center align-items-center gap-3" style="height: 80%">';
echo '<h1 class="display-6 fs-6">Carbon Footprint for December 2024</h1>';
echo '<div class="d-flex flex-column justify-content-center align-items-center w-100">';
echo '<p class="m-0">Carbon Footprint Distribution by Category</p>';
echo '<canvas id="doughnut"></canvas>';
echo '</div>';
echo '<p class="m-0">Total Carbon Footprint: 11,231</p>';
echo '</div>';
// bottom left
echo '<div class="border rounded d-flex flex-column justify-content-center align-items-center" style="height: 20%">';
echo '<h1 class="display-6 fs-6 pb-2">Share Your Environmental Impact</h1>';
echo '<div class="d-flex gap-4">';
echo '<a href="https://www.instagram.com/" class="link-secondary" target="_blank"><i class="bi bi-instagram"></i></a>';
echo '<a href="https://www.threads.net/" class="link-secondary" target="_blank"><i class="bi bi-threads"></i></a>';
echo '<a href="https://www.facebook.com/" class="link-secondary" target="_blank"><i class="bi bi-facebook"></i></a>';
echo '<a href="https://www.twitter.com/" class="link-secondary" target="_blank"><i class="bi bi-twitter-x"></i></a>';
echo '</div>';
echo '</div>';
echo '</div>';
// right
echo '<div class="d-flex flex-column gap-3 w-100 h-100">';
// top right
echo '<div class="border p-5 h-75 w-100 rounded d-flex flex-column justify-content-center align-items-center">';
echo '<div class="w-100 d-flex justify-content-start align-items-center gap-4 ps-4">';
echo '<ul class="pagination m-0 d-flex gap-2">';
echo '<li class="page-item disabled">';
echo '<button class="page-link text-secondary">';
echo '<i class="bi bi-chevron-compact-left"></i>';
echo '</button>';
echo '</li>';
echo '<li class="page-item">';
echo '<button class="page-link text-secondary">';
echo '<i class="bi bi-chevron-compact-right"></i>';
echo '</button>';
echo '</li>';
echo '</ul>';
echo '<h1 class="display-6 fs-6 m-0">Carbon Footprint Analysis for 2024 by Month</h1>';
echo '</div>';
echo '<canvas id="bar-chart"></canvas>';
echo '</div>';
// bottom right
echo '<div class="border p-5 rounded h-50 d-flex flex-column justify-content-center align-items-center overflow-hidden">';
echo '<h3 class="display-6 fs-6">Recommendation</h3>';
echo '<p class="">';
echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
echo '</p>';
echo '</div>';
echo '</div>';
echo '</div>';