<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../css/admin.css" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        
        /* Styles for the first three <a> tags */
        a:not(.admin-btn) {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
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
<body>

    <a href="event.php">Event</a>
    <a href="user_accounts.php">User Accounts</a>
    <a href="home.php">Normal</a>
    <a href="admin_dashboard.php" class="admin-btn"><i class="bi bi-person"></i></a>

</body>
</html>
