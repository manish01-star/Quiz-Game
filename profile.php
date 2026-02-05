<?php
session_start();
include('connection.php'); // Ensure this path is correct

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];

// Query the database for the user's details
$sql = "SELECT * FROM signup WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the user data from the database
    $user = $result->fetch_assoc();
    $user_email = $user['email'];
    $user_image = $user['profile_image'] ? $user['profile_image'] : 'uploads/profile.png'; // Default image if null
    $score = $user['score']; // User's score from the database
    $registration_date = isset($user['date']) ? strtotime($user['date']) : null; // Handle null or missing 'date'
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-card {
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #007bff;
            margin-bottom: 15px;
        }
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
                            <button class="btn btn-custom-logout px-5 py-3 rounded-pill"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-card">
                    <div class="profile-header">
                        <h2>Welcome, <?php echo $username; ?>!</h2>
                        <p>Your profile page where you can view your details and play the quiz.</p>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <img src="<?php echo $user_image; ?>" alt="Profile Image" class="profile-img">
                            <a href="edit_profile.php" class="btn btn-custom btn-edit-profile">Edit Profile</a>
                        </div>
                        <div class="col-md-6 profile-info">
                            <h5>Name : <?php echo $username; ?></h5>
                            <p>Email : <?php echo $user_email; ?></p>

                            <?php if ($registration_date) { ?>
                                <p>Member Since : <?php echo date("F j, Y", $registration_date); ?></p>
                            <?php } else { ?>
                                <p>Member Since : Not available</p>
                            <?php } ?>

                            <?php if (isset($score) && $score > 0) { ?>
                                <div class="mt-4">
                                    <h5>Quiz Results</h5>
                                    <p>Score: <?php echo $score; ?> / 100</p>
                                </div>
                            <?php } else { ?>
                                <p>No quiz attempts yet.</p>
                            <?php } ?>
                            
                            <div class="d-flex justify-content-center">
                                <a href="quize.php" class="btn btn-custom btn-custom-quiz px-5">Start Quiz</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
