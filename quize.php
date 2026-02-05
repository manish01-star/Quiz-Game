<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Full page background */
        body {
    position: relative;
    background-image: url('uploads/bg.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    font-family: Arial, sans-serif;
}

body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5); /* Darkens the background with black */
    z-index: -1; /* Makes sure the overlay stays behind the content */
}


        /* Style for quiz buttons with images */
        .quiz-btn {
            width: 150px;
            height: 150px;
            background-size: cover;
            background-position: center;
            color: white;
            border: none;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .quiz-btn:hover {
            opacity: 0.8;
        }

        /* Add a container to center the content */
        .container {
            padding-top: 60px;
            text-align: center;
        }

        /* Responsive layout for buttons */
        @media (max-width: 768px) {
            .d-flex {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- <?php
    session_start();
    $_SESSION['quizeid']  = 2;

    ?> -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
  <div class="container-fluid">
    <a class="navbar-brand ms-5" href="#"><img src="uploads/Quiz-Logo-removebg-preview.png" alt="" height="40px" width="40px">Quiz App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
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
    <button type="button" class="btn btn-success me-5" onclick="location.href='profile.php'">Profile</button>
  </div>
</nav>

<!-- Main Container -->
<div class="container">
  <!-- Quiz Buttons Section 1 -->
  <div class="d-flex justify-content-between mb-4">
  <div class="box ">
    <a href="mcq.php?quiz_id=1&subject=gk" class="quiz-btn" style="background-image: url('gk.jpg');">
    </a>
    <button class='w-100 btn btn-success'>Quize 1</button>
    </div>
  <div class="box ">
    <a href="mcq.php?quiz_id=1&subject=coding" class="quiz-btn" style="background-image: url('coding.jpg');">
    </a>
    <button class='w-100 btn btn-success'>Quize 3</button>
    </div>
    <div class="box ">
    <a href="mcq.php?quiz_id=1&subject=math" class="quiz-btn" style="background-image: url('math.avif');">
    </a>
    <button class='w-100 btn btn-success'>Quize 2</button>
    </div>
  </div>

  <!-- Quiz Buttons Section 2 -->
  <div class="d-flex justify-content-between mb-4">
  <div class="box ">
    <a href="mcq.php?quiz_id=1&subject=gk" class="quiz-btn" style="background-image: url('gk.jpg');">
    </a>
    <button class='w-100 btn btn-success'>Quize 6</button>
    </div>
    <div class="box ">
    <a href="mcq.php?quiz_id=1&subject=coding" class="quiz-btn" style="background-image: url('coding.jpg');">
    </a>
    <button class='w-100 btn btn-success'>Quize 4</button>
    </div>
    <div class="box ">
    <a href="mcq.php?quiz_id=1&subject=math" class="quiz-btn" style="background-image: url('math.avif');">
    </a>
    <button class='w-100 btn btn-success'>Quize 5</button>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
