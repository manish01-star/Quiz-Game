<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['adminname'])) {
    header("Location: login.php");
    exit();
}

// Include database connection file
include('connection.php');

// Retrieve user data from session
$username = $_SESSION['adminname'];
$user_email = $_SESSION['adminemail'];

// Fetch user data from the database
$sql = "SELECT * FROM `admin` WHERE username = '$username' AND email = '$user_email'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id']; // Get the user's ID from the database
    $current_username = $row['username'];
    $current_email = $row['email'];
    $current_image = $row['profile_image'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = $_POST['adminname'];
    $new_email = $_POST['adminemail'];
    $new_password = $_POST['adminpassword'];
    $new_image = $_FILES['profile_image']['name']; // Get the uploaded file name

    // Upload image if a new one is selected
    if (!empty($new_image)) {
        $target_dir = "uploads/"; // Specify the directory for the uploaded file
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        
        // Check for file upload errors
        if ($_FILES["profile_image"]["error"] == 0) {
            // Check if the file is uploaded successfully
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["profile_image"]["name"])) . " has been uploaded.";
                $user_image = $target_file; // Update user image with the uploaded file
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File upload error: " . $_FILES["profile_image"]["error"];
        }
    } else {
        // If no image is uploaded, keep the current one or use a default
        $user_image = $current_image; // Use the current profile image from the database
    }

    // Hash the password if a new password is provided
    if (!empty($new_password)) {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT); // Securely hash the new password
    } else {
        $new_password = $row['password']; // Keep the old password if not changed
    }

    // Update user data in the database
    $sql = "UPDATE `admin` SET username = ?, email = ?, password = ?, profile_image = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssi', $new_username, $new_email, $new_password, $user_image, $id);

    if (mysqli_stmt_execute($stmt)) {
        // Update session data to reflect changes
        $_SESSION['adminname'] = $new_username;
        $_SESSION['adminemail'] = $new_email;
        $_SESSION['profile_image'] = $user_image;
        echo "<script>alert('Profile updated successfully'); window.location.href = 'admin_profile.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Profile</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="adminname" class="form-label">Username</label>
                <input type="text" name="adminname" id="adminname" class="form-control" value="<?php echo htmlspecialchars($current_username); ?>" required>
            </div>
            <div class="mb-3">
                <label for="adminemail" class="form-label">Email</label>
                <input type="email" name="adminemail" id="adminemail" class="form-control" value="<?php echo htmlspecialchars($current_email); ?>" required>
            </div>
            <div class="mb-3">
                <label for="adminpassword" class="form-label">Password</label>
                <input type="password" name="adminpassword" id="adminpassword" class="form-control" placeholder="Enter new password (leave blank to keep current)">
            </div>
            <div class="mb-3">
                <label for="profile_image" class="form-label">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
