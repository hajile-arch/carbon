<?php
session_start();

// Check if the user is logged in as admin
$is_admin = false;
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    $is_admin = true;
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="admin.css">
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100dvh;">
    <?php if ($is_admin): ?>
      <a href="admin_dashboard.php" class="admin-btn"><i class="bi bi-person"></i></a>
    <?php endif; ?>
    <div class="border rounded p-5">
      <?php include '../../api/event-table.php' ?>
    </div>
</body>
</html>