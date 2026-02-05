<?php
session_start();

// If the user is not logged in, redirect to login page
if (!isset($_SESSION['adminname'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include('connection.php');

// Retrieve user data from session
$username = $_SESSION['adminname'];
$user_email = $_SESSION['adminemail']; // Assuming email is stored in session during login
$date = $_SESSION['admindate']; // Assuming 'date' stores user's registration date

// Fetch admin profile data from the database
$sql = "SELECT * FROM `admin` WHERE username = '$username' AND email = '$user_email'";
$result = mysqli_query($conn, $sql);

// If admin record is found
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $admin_image = $row['profile_image'] ?? 'profile.png'; // Default image if not set
} else {
    // If no record is found, fallback to default image
    $admin_image = 'profile.png';
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Profile Card Styling */
        .profile-card {
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .profile-card:hover {
            transform: translateY(-10px); /* Hover effect for profile card */
        }

        /* Profile Image Styling */
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #007bff;
            margin-bottom: 15px;
        }

        /* Profile Info Section Styling */
        .profile-info {
            margin-left: 20px;
        }

        .profile-info h4 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #333;
        }

        .profile-info p {
            font-size: 1.1rem;
            color: #555;
        }

        /* Custom Button Styling */
        .btn-custom {
            width: 180px;
            padding: 12px 20px;
            font-size: 1.1rem;
            border-radius: 25px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            opacity: 0.8;
        }

        .btn-custom-logout {
            background-color: #dc3545;
            color: white;
        }

        .btn-custom-quiz {
            background-color: #28a745;
            color: white;
        }

        /* Header Section Styling */
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #007bff;
        }

        .profile-header p {
            font-size: 1.1rem;
            color: #666;
        }

        /* Edit Profile Button Styling */
        .btn-edit-profile {
            background-color: #17a2b8;
            color: white;
            margin-top: 15px;
        }

        .btn-edit-profile:hover {
            background-color: #138496;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px;
        }

        .card-body .col-md-6 {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="#">Quiz App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?subject=about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?subject=contact">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <button class="btn btn-custom-logout px-5 py-3 rounded-pill">Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Profile Card -->
                <div class="profile-card">
                    <div class="profile-header">
                        <h2>Welcome, <?php echo $username; ?>!</h2>
                        <p>Your profile page where you can view your details and play the quiz.</p>
                    </div>

                    <!-- Profile Image and Info -->
                    <div class="card-body">
                        <div class="col-md-6">
                            <!-- Profile Image -->
                            <img src="<?php echo $admin_image; ?>" alt="Profile Image" class="profile-img">
                            <a href="edit_admin_profile.php" class="btn btn-custom btn-edit-profile">Edit Profile</a>
                        </div>

                        <div class="col-md-6 profile-info">
                            <!-- User Details -->
                            <h5>Name : <?php echo $username; ?></h5>
                            <p>Email : <?php echo $user_email; ?></p>
                            <p>Member Since : <?php echo date("F j, Y", strtotime($date)); ?></p>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-center">
                                <a href="quize.php" class="btn btn-custom btn-custom-quiz px-5">Start Quiz</a>
                            </div>

                            <!-- Edit Profile Button -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
