<?php
session_start();
include("connection.php"); // Include database connection

// Get the max question id from the database
$sql = "SELECT MAX(id) AS max_id FROM questions";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id']; // Get the max question ID from the database
}

// Initialize the session variable if not set
if (!isset($_SESSION['question_id'])) {
    $_SESSION['question_id'] = 1; // Start from the first question
}

// Ensure that the selected_option session variable is an array
if (!isset($_SESSION['selected_option'])) {
    $_SESSION['selected_option'] = [];
}

// Move to next question when 'Next' button is clicked
if (isset($_POST['next'])) {
    $selected_option = $_POST['option'] ?? '';
    if ($selected_option) {
        $_SESSION['selected_option'][$_SESSION['question_id']] = $selected_option; // Store selected option for the current question
    }

    if ($_SESSION['question_id'] < $max_id) {
        $_SESSION['question_id']++; // Increment question ID to move to next question
    }
}

// Move to the previous question when 'Previous' button is clicked
if (isset($_POST['pre'])) {
    if ($_SESSION['question_id'] > 1) {
        $_SESSION['question_id']--; // Decrement question ID to move to previous question
    }
}

// Get the current question data from the database
$current_question_id = $_SESSION['question_id'];
$sql = "SELECT id, question, opt1, opt2, opt3, opt4, ans FROM questions WHERE id = '$current_question_id'";
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
    
    // Checking if the selected option is correct
    $feedback = '';
    if ($selected_option) {
        if ($selected_option == $correct_answer) {
            $feedback = "Correct!";
        } else {
            $feedback = "Incorrect!";
        }
    }

    // Display the question and options
    echo "<h2>Question " . $current_question_id . ": " . $question_text . "</h2>";
    echo "<form method='post' action='mcqtest.php'>
        <input type='radio' name='option' value='opt1' " . ($selected_option == 'opt1' ? 'checked' : '') . "> $opt1<br>
        <input type='radio' name='option' value='opt2' " . ($selected_option == 'opt2' ? 'checked' : '') . "> $opt2<br>
        <input type='radio' name='option' value='opt3' " . ($selected_option == 'opt3' ? 'checked' : '') . "> $opt3<br>
        <input type='radio' name='option' value='opt4' " . ($selected_option == 'opt4' ? 'checked' : '') . "> $opt4<br>
        
        <p>" . ($feedback ? $feedback : '') . "</p>
        
        <div>
            <button type='submit' name='pre'>Previous</button>
            <button type='submit' name='next'>Next</button>
        </div>
    </form>";
    
    // Show the final result after all questions are answered
    if ($_SESSION['question_id'] == $max_id) {
        echo "<h3>Quiz Completed!</h3>";
        // Calculate the score
        $score = 0;
        foreach ($_SESSION['selected_option'] as $question_id => $selected) {
            $sql_check = "SELECT ans FROM questions WHERE id = '$question_id'";
            $check_result = mysqli_query($conn, $sql_check);
            $row = mysqli_fetch_assoc($check_result);
            if ($selected == $row['ans']) {
                $score++;
            }
        }
        echo "Your Score: $score / $max_id";
        
        session_unset();  // Reset session after completing the quiz
    }
}
?>
