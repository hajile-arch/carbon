<?php
session_start();

// Check if user is logged in as admin (implement your logic here)

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

// Check if form is submitted for adding or deleting events
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["action"]) && $_POST["action"] == "add") {
    // Process form data for adding a new event
    $title = trim($_POST["title"]); // Trim leading/trailing whitespace
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = trim($_POST["location"]);
    $organizer = trim($_POST["organizer"]);
    $categories = isset($_POST["categories"]) ? implode(", ", $_POST["categories"]) : ""; // Combine selected categories
    $description = trim($_POST["description"]);
    $image = ""; // Assuming image upload logic is implemented elsewhere

    // Basic validation (replace with more comprehensive checks if needed)
    $errors = [];
    if (empty($title)) {
      $errors[] = "Title is required.";
    }
    if (empty($date)) {
      $errors[] = "Date is required.";
    }
    if (empty($time)) {
      $errors[] = "Time is required.";
    }
    if (empty($location)) {
      $errors[] = "Location is required.";
    }
    if (empty($organizer)) {
      $errors[] = "Organizer is required.";
    }

    if (empty($errors)) {
      // Insert event data into the database
      $sql = "INSERT INTO events (title, date, time, location, organizer, categories, description, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sssssssss", $title, $date, $time, $location, $organizer, $categories, $description, $image);

      if ($stmt->execute()) {
        echo "Event added successfully!";
      } else {
        echo "Error adding event: " . $conn->error;
      }
    } else {
      // Display validation errors
      echo "Please fix the following errors:";
      echo "<ul>";
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      echo "</ul>";
    }
  } else if (isset($_POST["action"]) && $_POST["action"] == "delete" && isset($_POST["event_id"])) {
    // Delete event based on the provided ID
    $event_id = $_POST["event_id"];

    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);

    if ($stmt->execute()) {
      echo "Event deleted successfully!";
    } else {
      echo "Error deleting event: " . $conn->error;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="admin.css">
  </head>
  <body class="d-flex justify-content-center align-items-center" style="height: 100dvh;">
    <form class="border p-5 gap-4 rounded d-flex flex-column justify-content-center align-items-center w-50">
      <h1 class="display-6">Add Event</h1> 
      <div class="form-floating w-100">
        <input type="text" class="form-control" id="title" placeholder="title">
        <label for="title">Title</label>
      </div>
      <div class="form-floating w-100">
        <input type="text" class="form-control" id="date" placeholder="date">
        <label for="date">Date</label>
      </div>
      <div class="form-floating w-100">
        <input type="text" class="form-control" id="time" placeholder="time">
        <label for="time">Time</label>
      </div>
      <div class="form-floating w-100">
        <input type="text" class="form-control" id="location" placeholder="location">
        <label for="location">Location</label>
      </div>
      <div class="form-floating w-100">
        <input type="text" class="form-control" id="organizer" placeholder="organizer">
        <label for="organizer">Organizer</label>
      </div>
      <div class="w-100 d-flex gap-4">
        <button type="submit" class="btn btn-outline-dark w-50">
          Save changes
        </button>
        <a href="admin_event.php" class="btn btn-outline-secondary w-50">
          Cancel
        </a>
      </div>
    </form>
    <a href="admin_dashboard.php" class="admin-btn"><i class="bi bi-person"></i></a>
  </body>
</html>