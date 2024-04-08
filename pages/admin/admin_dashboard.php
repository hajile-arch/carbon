<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="admin.css" />
  <style>
    /* Styles for the first three <a> tags */
    a:not(.admin-btn) {
      text-decoration: none;
      color: #333;
      padding: 10px 0px;
      width: 150px;
      text-align: center;
      border-radius: 5px;
      background-color: #fff;
      border: 1px solid #333;
      margin-bottom: 10px;
      transition: all 0.3s ease-in-out;
    }
    
    /* Hover effect for the first three <a> tags */
    a:not(.admin-btn):hover {
      background-color: #333;
      color: #fff;
    }
  </style>
</head>
<body class="bg-body-secondary d-flex flex-column justify-content-center align-items-center gap-2 border-1" style="height: 100dvh;">
  <a href="admin_event.php">Event</a>
  <a href="admin_user.php">User Accounts</a>
  <a href="../login.html">Logout</a>
  <a href="admin_dashboard.php" class="admin-btn"><i class="bi bi-person"></i></a>
</body>
</html>
