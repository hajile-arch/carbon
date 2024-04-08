<?php

session_start();

// Check if the user is logged in as admin
$is_admin = false;
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    $is_admin = true;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$email = $_GET['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $newEmail = $_POST["email"];
        $newPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
        
        // Update the user's email and password in the database
        $sql = "UPDATE registrations SET email = ?, password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $newEmail, $newPassword, $email);

        if ($stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user: " . $conn->error;
        }
        header("Location: admin_user.php");
        exit;
    } else {
        echo "Email and password are required fields.";
    }
}

// Fetch user details based on the provided email
$sql = "SELECT * FROM registrations WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display user details (email, password) in a form for editing
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title> 
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="admin.css" />
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100dvh;">
    <form method="post" class="border p-5 gap-4 rounded d-flex flex-column justify-content-center align-items-center w-50">
      <h1 class="display-6">Edit User</h1> 
      <div class="form-floating w-100">
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $row['email']; ?>">
        <label for="email">Email</label>
      </div>
      <div class="form-floating w-100">
        <input type="text" class="form-control" id="password" name="password" placeholder="password">
        <label for="password">Password</label> 
      </div>
      <div class="d-flex w-100 gap-4">
          <button type="submit" class="btn btn-outline-dark w-50">
            Update
          </button>
          <a href="admin_user.php" class="btn btn-outline-secondary w-50">Cancel</a>
      </div>
    </form>
    <a href="admin_dashboard.php" class="admin-btn"><i class="bi bi-person"></i></a>
</body>
</html>

<?php
} else {
    echo "User not found.";
}

$stmt->close();
$conn->close();
?>
