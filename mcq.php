<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mcq Test</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
    <div class="container-fluid">
    <a class="navbar-brand ms-5" href="#"><img src="uploads/Quiz-Logo-removebg-preview.png" alt="" height="40px" width="40px">Quiz App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Left-aligned subject buttons -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?subject=about">About</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="?subject=gk">General Knowledge</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="?subject=contact">contact</a>
                </li>
            </ul>

            <!-- Right-aligned buttons: Add New, Profile, and Logout -->
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <button class="btn btn-custom-logout px-5 py-3 rounded-pill"><i class="fas fa-sign-out-alt"></i> Logout</button>

                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
session_start();
// echo $_SESSION['email'];

// Include database connection
include("connection.php"); 

// Ensure 'quiz_id' and 'subject' are present in the URL
$quiz_id = isset($_GET['quiz_id']) ? $_GET['quiz_id'] : '';
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';

// If either 'quiz_id' or 'subject' is missing, display an error message
if (!$quiz_id || !$subject) {
    echo "<h2>Missing 'quiz_id' or 'subject' in the URL!</h2>";
    exit();
}

// Get the max question id from the database
$sql = "SELECT MAX(id) AS max_id FROM $subject WHERE quizid = '$quiz_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($result) {
    $max_id = $row['max_id']; // Get the max question ID from the database
}

// Store the user's email in a variable before resetting
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Initialize session variables if not set
if (!isset($_SESSION['question_id'])) {
    $_SESSION['question_id'] = 1; // Start from the first question
}

if (!isset($_SESSION['selected_option'])) {
    $_SESSION['selected_option'] = []; // Initialize selected options array
}

// Handle "Reset Quiz" functionality
if (isset($_POST['reset'])) {
    // Preserve the email session variable
    $_SESSION['email'] = $email; // Re-set the email session variable

    // Unset other session variables related to the quiz
    unset($_SESSION['question_id']);
    unset($_SESSION['selected_option']);
    
    // Destroy only quiz-related session variables, but keep email
    header("Location: mcq.php?quiz_id=$quiz_id&subject=$subject"); // Redirect to restart the quiz
    exit();
}
// Move to next question when 'Next' button is clicked
if (isset($_POST['next'])) {
    $selected_option = $_POST['option'] ?? '';
    if ($selected_option) {
        $_SESSION['selected_option'][$_SESSION['question_id']] = $selected_option; // Store selected option
    }

    if ($_SESSION['question_id'] < $max_id) {
        $_SESSION['question_id']++; // Move to next question
    }
}

// Move to previous question when 'Previous' button is clicked
if (isset($_POST['pre'])) {
    if ($_SESSION['question_id'] > 1) {
        $_SESSION['question_id']--; // Move to previous question
    }
}

// Get the current question data from the database based on the selected subject
$current_question_id = $_SESSION['question_id'];
$sql = "SELECT id, question, opt1, opt2, opt3, opt4, ans FROM $subject WHERE quizid = '$quiz_id' AND id = '$current_question_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $question = mysqli_fetch_assoc($result);

    $question_text = $question['question'];
    $opt1 = $question['opt1'];
    $opt2 = $question['opt2'];
    $opt3 = $question['opt3'];
    $opt4 = $question['opt4'];
    $correct_answer = $question['ans'];

    // Check if the user has selected an answer for this question
    $selected_option = isset($_SESSION['selected_option'][$current_question_id]) ? $_SESSION['selected_option'][$current_question_id] : '';

    // Display the question and options
    echo "<div class='container mt-5'>";
    echo "<div class='card shadow-lg p-4 mb-4 rounded p-5'>";
    echo "<h2 class='mb-4'>Question " . $current_question_id . ": " . $question_text . "</h2>";
    echo "<form method='post' action='mcq.php?quiz_id=$quiz_id&subject=$subject'>
        <input type='hidden' name='quiz_id' value='$quiz_id'>
        <input type='hidden' name='subject' value='$subject'>
        
        <div class='form-check h5 pt-3'>
            <input type='radio' name='option' value='opt1' class='form-check-input' " . ($selected_option == 'opt1' ? 'checked' : '') . " id='opt1'>
            <label class='form-check-label' for='opt1'>$opt1</label>
        </div>
        <div class='form-check h5 pt-3'>
            <input type='radio' name='option' value='opt2' class='form-check-input' " . ($selected_option == 'opt2' ? 'checked' : '') . " id='opt2'>
            <label class='form-check-label' for='opt2'>$opt2</label>
        </div>
        <div class='form-check h5 pt-3'>
            <input type='radio' name='option' value='opt3' class='form-check-input' " . ($selected_option == 'opt3' ? 'checked' : '') . " id='opt3'>
            <label class='form-check-label' for='opt3'>$opt3</label>
        </div>
        <div class='form-check h5 pt-3'>
            <input type='radio' name='option' value='opt4' class='form-check-input' " . ($selected_option == 'opt4' ? 'checked' : '') . " id='opt4'>
            <label class='form-check-label' for='opt4'>$opt4</label>
        </div>

        <div class='d-flex justify-content-between mt-4 px-3'>
            <button type='submit' name='pre' class='btn btn-secondary btn-lg'>Previous</button>
            <form method='post' action='mcq.php?quiz_id=$quiz_id&subject=$subject' class='text-center mt-5'>
                <button type='submit' name='reset' class='btn btn-danger btn-lg'>Reset Quiz</button>
            </form>
            <button type='submit' name='next' class='btn btn-primary btn-lg px-4'>Next</button>
        </div>
    </form>";

    // Show the final result after all questions are answered
    if ($_SESSION['question_id'] == $max_id) {
        echo "<h3 class='mt-5 text-center'>Quiz Completed!</h3>";
        // Calculate the score
        $score = 0;
        $total_questions = count($_SESSION['selected_option']);

        foreach ($_SESSION['selected_option'] as $question_id => $selected) {
            // Fetch the correct answer from the database for the current question
            $sql_check = "SELECT ans FROM $subject WHERE quizid = '$quiz_id' AND id = '$question_id'";
            $check_result = mysqli_query($conn, $sql_check);
            $row = mysqli_fetch_assoc($check_result);

            if ($selected == $row['ans']) {
                $score++; // Increment score for correct answers
            }
        }

        // Display the final score
        echo "<div class='text-center mt-4'>
        <a href='score.php' class='btn btn-success btn-lg px-5'>View Result</a>
      </div>";

        // Save score to session for later display in the profile
        $_SESSION['score'] = $score;
        $_SESSION['total_questions'] = $total_questions;
        echo $_SESSION['score'] ;
    }

    echo "</div>"; // Close card container
    echo "</div>"; // Close main container
}
?>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
