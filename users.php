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

// Handle delete action
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    
        $delete_sql = "DELETE FROM signup WHERE id = '$id'";
         $r =  mysqli_query($conn , $delete_sql);

        if ($r) {
            echo "<script>alert('Record deleted successfully'); window.location.href = window.location.href;</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } 
    else {
        echo "Invalid ID.";
    }

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
            padding-top: 0;
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
            <a class="nav-link" href="dasbord.php?subject=gk">
                <i class="fas fa-tachometer-alt"></i> Dashboard </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-users"></i> Users
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-cogs"></i> Settings
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-line"></i> Analytics
                </a>
            </li>
        </ul>
    </div>

    <!-- Main content area -->
    <div class="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
            <a class="navbar-brand ms-5" href="#"><img src="uploads/Quiz-Logo-removebg-preview.png" alt="" height="40px" width="40px">Quiz App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
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

        <!-- Dashboard content -->
        <div class="container-fluid">
            <h1 class="mb-4 mt-4">Dashboard</h1>

            <!-- Example Table -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>User Data</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Check if any user data exists
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                    echo "<td>" . $row['score'] . "</td>";
                                    // Form with delete button
                                    echo "<td>
                                            <form method='post' action=''>
                                                <input type='hidden' name='id' value='" . $row['id'] . "'> 
                                                <button class='btn btn-danger btn-sm' name='delete' type='submit' value='delete'>Delete</button>
                                            </form> 
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>No users found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (required for dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

