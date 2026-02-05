<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="#">Quiz App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
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
            </div>
            <button type="button" class="btn btn-primary me-5" onclick="location.href='add.php'">Add New</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
