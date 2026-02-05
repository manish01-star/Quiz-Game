<?php
session_start();

include "connection.php";
// Retrieve score from the session
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
$total_questions = isset($_SESSION['total_questions']) ? $_SESSION['total_questions'] : 0;

$email = $_SESSION['email'];
$name = $_SESSION['username'];
$avr =  round(($score / $total_questions ) * 100);


if(isset($_SESSION['username'])){
    $sql = "UPDATE `signup` SET `score` = '$avr%' WHERE `signup`.`email` = '$email'";
    mysqli_query($conn , $sql);
}
else{
    echo "not found email";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Score</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
            <a class="navbar-brand ms-5" href="#"><img src="uploads/Quiz-Logo-removebg-preview.png" alt="" height="40px" width="40px">Quiz App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
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

    <div class="container mt-5">
        <div class="card shadow-lg p-4 mb-4 rounded p-5">
            <h3 class="text-center"> <span class="text-success fw-bold"><?php echo $name; ?></span>  Your Quiz Results</h3>
            <h4 class="text-center">  Your Score: <?php echo $score; ?> / <?php echo $total_questions; ?></h4>
            <h4 class="text-center">  Result: <?php echo $avr."%"; ?></h4>
            <div class="text-center mt-4">
                <a href="profile.php" class="btn btn-success btn-lg">Go to Profile</a>
        <a href='quize.php' class='btn btn-primary btn-lg'>Quize</a>
            </div>
        </div>
    </div>
</body>

</html>
