<?php
session_start();

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

// Check if form is submitted for adding events
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "add") {
    // Process form data for adding a new event
    $title = trim($_POST["title"]);
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = trim($_POST["location"]);
    $organiser = trim($_POST["organiser"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone_no"]);
    $categories = isset($_POST["categories"]) ? implode(", ", array_map('trim', explode(",", $_POST["categories"]))) : ""; // Convert categories string to array
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
    if (empty($organiser)) {
        $errors[] = "Organizer is required.";
    }

    // Check if the title already exists
    $sql_check_title = "SELECT * FROM events WHERE title = ?";
    $stmt_check_title = $conn->prepare($sql_check_title);
    $stmt_check_title->bind_param("s", $title);
    $stmt_check_title->execute();
    $result_check_title = $stmt_check_title->get_result();

    if ($result_check_title->num_rows > 0) {
        $errors[] = "";
    }
    // Event with this title already exists.
    $stmt_check_title->close();

    if (empty($errors)) {
        // Insert event data into the database
        //TODO: 
        // if (true)
        $sql = "INSERT INTO events (title, date, time, location, organiser, email, phone_no, categories, description, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        // Bind parameters
        $stmt->bind_param("ssssssssss", $title, $date, $time, $location, $organiser, $email, $phone, $categories, $description, $image);

        if ($stmt->execute()) {
            header("Location:admin_event.php");
            exit;
        } else {
            echo "Error adding event: " . $stmt->error;
        }
        // Close prepared statement
        $stmt->close();
    } else {
        // Display validation errors
        echo "Please fix the following errors:";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="../../styles.css">
</head>
<body class="d-flex justify-content-center align-items-center py-5">
<form novalidate class="needs-validation border p-5 gap-4 rounded d-flex flex-column justify-content-center align-items-center w-50" action="" method="POST">
    <h1 class="display-6">Add Event</h1>
    <div class="form-floating w-100">
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
        <label for="title">Title</label>
        <div class="invalid-feedback">
            Please provide a valid title
        </div>
    </div>
    <div class="form-floating w-100">
        <input type="date" class="form-control" id="date" name="date" placeholder="Date" required>
        <label for="date">Date</label>
        <div class="invalid-feedback">
            Please provide a valid date
        </div>
    </div>
    <div class="form-floating w-100">
        <input type="time" class="form-control" id="time" name="time" placeholder="Time" required>
        <label for="time">Time</label>
        <div class="invalid-feedback">
            Please provide a valid time
        </div>
    </div>
    <div class="form-floating w-100">
        <input type="text" class="form-control" id="location" name="location" placeholder="Location" required>
        <label for="location">Location</label>
        <div class="invalid-feedback">
            Please provide a valid location
        </div>
    </div>
    <div class="form-floating w-100">
        <input type="text" class="form-control" id="organiser" name="organiser" placeholder="Organiser" required>
        <label for="organiser">Organiser</label>
        <div class="invalid-feedback">
            Please provide a valid organiser
        </div>
    </div>
    <div class="form-floating w-100">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        <label for="email">Email</label>
        <div class="invalid-feedback">
            Please provide a valid email
        </div>
    </div>
    <div class="form-floating w-100">
        <input type="number" class="form-control" id="phone" name="phone_no" placeholder="Phone" required oninput="phoneNumberValidation()">
        <label for="phone">Phone Number</label>
        <div class="invalid-feedback">
            Please provide a valid phone number
        </div>
    </div>
    <div class="form-floating w-100">
        <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
        <label for="description">Description</label>
        <div class="invalid-feedback">
            Please provide a valid description
        </div>
    </div>
    <div class="form-floating w-100">
        <input type="text" class="form-control" id="categories" name="categories" placeholder="Categories" required oninput="categoriesValidation()">
        <label for="categories">Categories</label>
        <div class="invalid-feedback">
            Please provide two category separated by a comma
        </div>
    </div>
    <div class="form-floating w-100">
        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        <label for="image">Image</label>
        <div class="invalid-feedback">
            Please provide a valid image
        </div>
    </div>
    <div class="w-100 d-flex gap-4">
        <button type="submit" class="btn btn-outline-dark w-50" name="action" value="add">Save changes</button>
        <a href="admin_event.php" class="btn btn-outline-secondary w-50">Cancel</a>
    </div>
</form>
<a href="admin_dashboard.php" class="admin-btn"><i class="bi bi-person"></i></a>
<script src="../../scripts/admin/_add_event.js"></script>
</body>
</html>
