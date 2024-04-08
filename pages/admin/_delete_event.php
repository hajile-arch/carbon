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

// TODO: elijah
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // User confirmation required before deleting
//   if (isset($_POST["confirm_delete"])) {
    // Delete the user from the database
    // $sql = "?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("s", $email);

//     if ($stmt->execute()) {
//       echo "User deleted successfully.";
//     } else {
//       echo "Error deleting user: " . $conn->error;
//     }
//   } else {
//     echo "Please confirm deletion.";
//   }
// }

// Fetch user details based on the provided email
// $sql = "SELECT * FROM registrations WHERE email = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("s", $email);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//   $row = $result->fetch_assoc();
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="admin.css" />
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100dvh;">
  <div class="border p-5 rounded">
    <h1 class="display-6">Delete Title</h1>
    <p>Are you sure you want to delete the event with title: <span class="link-secondary text-decoration-underline">[title]</span> ?</p>
    <form method="post">
      <input type="hidden" name="email">
      <input type="submit" name="confirm_delete" value="Delete" class="btn btn-outline-danger">
      <a href="admin_event.php" class="btn btn-outline-secondary ms-2">Cancel</a>
    </form>
    <a href="admin_dashboard.php" class="admin-btn"><i class="bi bi-person"></i></a>
  </div>
</body>

</html>

<?php

// $stmt->close();
$conn->close();
?>

