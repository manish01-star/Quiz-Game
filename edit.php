<?php
include("connection.php");

if (isset($_GET['id']) && isset($_GET['subject'])) {
    $urlId = $_GET['id']; // Get the ID from URL
    $subject = $_GET['subject']; // Get the subject from URL

    // Fetch existing question data from the database
    $sql = "SELECT * FROM `$subject` WHERE id = $urlId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $question = $row['question'];
        $opt1 = $row['opt1'];
        $opt2 = $row['opt2'];
        $opt3 = $row['opt3'];
        $opt4 = $row['opt4'];
        $ans = $row['ans'];
    } else {
        echo "Question not found.";
        exit;
    }

    // Handle form submission for updating the question
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $question = $_POST['question'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        $opt4 = $_POST['opt4'];
        $ans = $_POST['ans'];
        $subject = $_POST['subject'];  // Subject could be updated if needed

        // Prepare the SQL UPDATE query
        $updateSql = "UPDATE `$subject` SET 
                        `question` = '$question', 
                        `opt1` = '$opt1', 
                        `opt2` = '$opt2', 
                        `opt3` = '$opt3', 
                        `opt4` = '$opt4', 
                        `ans` = '$ans'
                      WHERE `id` = $urlId";  // Use the URL ID to update the correct row

        // Execute the update query
        if (mysqli_query($conn, $updateSql)) {
            echo "<script>alert('Question updated successfully'); window.location.href = 'edit.php?id=$urlId&subject=$subject';</script>";
        } else {
            echo "<script>alert('Update failed. Please try again.');</script>";
        }
    }
} else {
    echo "Invalid ID or subject.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Question</h1>
        <form action="edit.php?id=<?php echo $urlId; ?>&subject=<?php echo $subject; ?>" method="POST">

            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question" value="<?php echo htmlspecialchars($question); ?>" required>
            </div>

            <div class="form row">
                <div class="form-group col-lg-6">
                    <label for="opt1">Option 1</label>
                    <input type="text" class="form-control" id="opt1" name="opt1" value="<?php echo htmlspecialchars($opt1); ?>" required>
                </div>

                <div class="form-group col-lg-6">
                    <label for="opt2">Option 2</label>
                    <input type="text" class="form-control" id="opt2" name="opt2" value="<?php echo htmlspecialchars($opt2); ?>" required>
                </div>
            </div>

            <div class="form row">
                <div class="form-group col-lg-6">
                    <label for="opt3">Option 3</label>
                    <input type="text" class="form-control" id="opt3" name="opt3" value="<?php echo htmlspecialchars($opt3); ?>" required>
                </div>

                <div class="form-group col-lg-6">
                    <label for="opt4">Option 4</label>
                    <input type="text" class="form-control" id="opt4" name="opt4" value="<?php echo htmlspecialchars($opt4); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ans">Answer</label>
                <input type="text" class="form-control" id="ans" name="ans" value="<?php echo htmlspecialchars($ans); ?>" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="<?php echo htmlspecialchars($subject); ?>" required readonly>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Question</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
