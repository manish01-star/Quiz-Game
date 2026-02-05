<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");

    // Get form data
    $question = $_POST['question'];
    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];
    $opt3 = $_POST['opt3'];
    $opt4 = $_POST['opt4'];
    $ans = $_POST['ans'];
    
    // Check if subject and paperid exist in the POST request
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';  // Default to empty if not set
    $quizid =  $_POST['quizid'] ;  // Default to empty if not set

    // Check if question already exists
    $sql = "SELECT * FROM $subject WHERE question = '$question'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num == 0) {
        // Insert new question into the database
        $sql = "INSERT INTO `$subject` (`question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `subject`, `quizid`) 
                VALUES ('$question', '$opt1', '$opt2', '$opt3', '$opt4', '$ans', '$subject', '$quizid')";
        $r = mysqli_query($conn, $sql);
        
        if ($r) {
            echo "<script>
                    alert('Insert successfully');
                  </script>";
        } else {
            echo "<script>
                    alert('Insertion failed');
                  </script>";
        }
    } else {
        echo "<script>
                alert('Question already exists');
              </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <div class="center text-center">
        <h2>Add a New Question</h2>
    </div>
    <form action="add.php" method="POST">
        
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" class="form-control" id="question" name="question" placeholder="Enter your question" required>
        </div>

        <div class="form row">
        <div class="form-group col-lg-6">
            <label for="opt1">Option 1</label>
            <input type="text" class="form-control" id="opt1" name="opt1" placeholder="Enter Option 1" required>
        </div>

        <div class="form-group col-lg-6">
            <label for="opt2">Option 2</label>
            <input type="text" class="form-control" id="opt2" name="opt2" placeholder="Enter Option 2" required>
        </div>
        </div>

        <div class="form row">
        <div class="form-group col-lg-6">
            <label for="opt3">Option 3</label>
            <input type="text" class="form-control" id="opt3" name="opt3" placeholder="Enter Option 3" required>
        </div>

        <div class="form-group col-lg-6">
            <label for="opt4">Option 4</label>
            <input type="text" class="form-control" id="opt4" name="opt4" placeholder="Enter Option 4" required>
        </div>
        </div>

        <div class="form-group text-success">
            <label for="ans">Answer</label>
            <input type="text" class="form-control" id="ans" name="ans" placeholder="Enter Correct Answer" required>
        </div>

       <!-- New Subject Field -->
        <div class="form row">
<div class="form-group col-lg-6">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
</div>

<!-- New quizid Field -->
<div class="form-group col-lg-6">
    <label for="quizid">Quiz ID</label>
    <input type="text" class="form-control" id="quizid" name="quizid" placeholder="Enter Quiz id" required>
</div>
</div>


        <div class="center text-center">
            <button type="submit" class="btn btn-primary">Submit Question</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>
