<?php
// if (!isset($_SESSION['adminname'])) {
//     header("Location: login.php");
//     exit();
// }

session_start();
include 'connection.php';

// Fetch user data from the database
$sql = "SELECT * FROM signup";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
        }
        .sidebar .nav-item {
            margin-bottom: 10px;
        }
        .sidebar .nav-item i {
            margin-right: 10px;
        }

        /* Main content */
        .content {
            margin-left: 250px;
            padding: 30px;
        }

        /* Adjust top navbar */
        .navbar {
            z-index: 1;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-white text-center mb-4">Admin Panel</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-users"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-line"></i> Analytics
                </a>
            </li>
        </ul>
    </div>

    <!-- Main content area -->
    <div class="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="#"><img src="uploads/Quiz-Logo-removebg-preview.png" alt="" height="40px" width="40px">Quiz App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Left-aligned subject buttons -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?subject=math">Math</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?subject=gk">General Knowledge</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?subject=coding">Coding</a>
                </li>
            </ul>

            <!-- Right-aligned buttons: Add New, Profile, and Logout -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary me-3" onclick="location.href='add.php'">Add New</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_profile.php">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>



    <div class="container">

<?php
include("connection.php");

// Handling subject selection
$subject = isset($_GET['subject']) ? $_GET['subject'] : 'gk'; 

// SQL Query to fetch questions based on the selected subject
$sql = "SELECT * FROM $subject ";
// $stmt = mysqli_prepare($conn, $sql);
// mysqli_stmt_bind_param($stmt, 's', $subject);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);

$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

// Handle deletion
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Using prepared statement to prevent SQL injection
    $delete_sql = "DELETE FROM $subject WHERE id = ?";
    $delete_stmt = mysqli_prepare($conn, $delete_sql);
    mysqli_stmt_bind_param($delete_stmt, 'i', $id);
    
    if (mysqli_stmt_execute($delete_stmt)) {
        echo "<script>alert('Record deleted successfully'); window.location.href = window.location.href;</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<?php
if ($num > 0) {
    echo "<table class='table table-striped'>
    <h1 class='mb-4'>Dashboard</h1>
    <thead>
        <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Option 4</th>
            <th>Answer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["question"]) . "</td>
                <td>" . htmlspecialchars($row["opt1"]) . "</td>
                <td>" . htmlspecialchars($row["opt2"]) . "</td>
                <td>" . htmlspecialchars($row["opt3"]) . "</td>
                <td>" . htmlspecialchars($row["opt4"]) . "</td>
                <td class='text-success fw-bolder'>" . htmlspecialchars($row["ans"]) . "</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>
                        <button type='submit' class='btn btn-danger' name='delete'>Delete</button>
                        <button type='button' class='btn btn-success' onclick='location.href=\"edit.php?id=" . htmlspecialchars($row["id"]. "&subject=". $_GET['subject']) . "\"'>Edit</button>
                    </form>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No results found for subject: $subject</p>";
}
?>
</div>
    </div>

    <!-- Bootstrap JS (required for dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
?>