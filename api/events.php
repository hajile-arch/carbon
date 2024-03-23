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

// Handle form submission and get search query
$search_query = isset($_GET['searchForEvents']) ? $_GET['searchForEvents'] : '';

// SQL query to fetch events data
$sql_select_events = "SELECT * FROM events";
$result = $conn->query($sql_select_events);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="event-ctn card d-flex flex-row justify-content-center align-items-center rounded border shadow overflow-hidden" style="height: 300px">';
        echo '<img src="../img/event/' . $row['image'] . '" class="card-img-top rounded-0 object-fit-cover" alt="'. $row['image'] .'" style="width: 40%" />';
        echo '<div class="card-body p-5">';
        echo '<h5 class="card-title">' . $row['title'] . '</h5>';
        echo '<p class="card-text text-body-tertiary">';
        echo 'Date: ' . $row['date'] . '<br />';
        echo 'Time: ' . $row['time'] . '<br />';
        echo 'Location: ' . $row['location'] . '<br />';
        echo 'Organiser: ' . $row['organiser'];
        echo '</p>';
        
        // Split the categories string by comma
        $categories = explode(', ', $row['categories']);
        
        // Output the first category in the first box
        echo '<div class="d-flex gap-3 pb-4">';
        echo '<div class="border p-1 px-2 rounded"># ' . $categories[0] . '</div>';
        
        // Output the second category in the second box, if exists
        if (isset($categories[1])) {
            echo '<div class="border p-1 px-2 rounded"># ' . $categories[1] . '</div>';
        }
        echo '</div>';
        
        echo '<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-'.$id.'">See details</button>';
        echo '<div class="modal fade" id="modal-'.$id.'" tabindex="-1" aria-labelledby="modal-'.$id.'-label" aria-hidden="true">';
        echo '<div class="modal-dialog modal-dialog-centered modal-lg">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="inner-card-title">' . $row['title'] . '</h5>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        echo '</div>';
        echo '<div class="modal-body d-flex justify-content-evenly">';
        echo '<div class="w-50">';
        echo '<h5 class="fw-semibold">Details</h5>';
        echo '<p class="card-text fs-6 text-body-secondary">';
        echo 'Date: ' . $row['date'] . '<br />';
        echo 'Time: ' . $row['time'] . '<br />';
        echo 'Location: ' . $row['location'] . '<br />';
        echo 'Organiser: ' . $row['organiser'] . '<br>';
        echo 'Email: ' . $row['email'] . '<br />';
        echo 'Phone: ' . $row['phone_no'];
        echo '</p>';
        echo '</div>';
        echo '<div class="w-50">';
        echo '<h5 class="fw-semibold">Description</h5>';
        echo '<p class="card-text fs-6 text-body-secondary">';
        echo $row['description'];
        echo '</p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
        echo '<a href="register.html">';
        echo '<button type="button" class="btn btn-primary">Sign Up</button>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
