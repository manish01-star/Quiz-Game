<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        
        .big_box {
            display: flex;
            justify-content: center;
            background-color: rgb(240, 239, 239);
        }

        .box{
            margin-top: 40px;
            height: 480px; 
            width: 460px;
            padding: 40px;
            background-color: white;
            box-shadow: 1px 1px 12px rgb(138, 137, 137);
            border-radius: 5px;
        }
        .form-box{
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            max-height: 60px;
            transition: max-height 0.2s;
        }
        #SignUp{
            margin-left: 15px;
            width: 40%;
            height: 40px;
            margin-top: 10px;
            background-color: #007bffa6;
            color: white;
            font-size: large;
            border-radius: 5px;
        }
        #login{
            margin-left: 50px;
            width: 40%;
            height: 40px;
            margin-top: 10px;
            background-color: #c300ffab;
            color: white;
            font-size: large;
            border-radius: 5px;
        }
        input{
            margin-top: 5px;
            height: 30px;
            background-color: transparent;
            border: 2px solid rgba(97, 96, 96, 0.329);
            border-radius: 4px;
        }
        label{
            color: rgba(85, 84, 84, 0.979);
        }
        form{
            height: 340px;
        }
    </style>
</head>
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
<!--                 
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                    </a>
                </li> -->
                <li class="nav-item text-center">
                    <a class="nav-link" href="login.php">
                        <button class="btn btn-custom-logout px-5 py-2 bg-primary rounded-pill"> logIn</button>

                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="big_box">
    <div class="box">
        <center><h1 id="title">Sign Up</h1></center>
        <form id="form" method="post">
            <div id="name-field">
           <div class="form-box name">
            <label for="name" id="nameLable">UserName:</label>
            <input type="text" id="UserName" name="name1" required >
            <span class="name"></span>
           </div>
            </div>

           <div class="form-box">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required >
            <span class="email"></span>
           </div>

           <div class="form-box">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required >
            <span class="password"></span>
           </div>

           <div class="form-box">
            <label for="Repassword">Conform-Password:</label>
            <input type="password" id="Repassword" name="repassword" required >
            <span class="Repassword"></span>
           </div>

              <button id="SignUp" type="submit">SignUp</button>
              <button id="login" onclick="location.href='login.php'">logIn</button>
        </form>
        </div>
        <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include("connection.php");

    $name = $_POST['name1'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "Select * from `signup` where username = '$name' and email = '$email'";
    $result = mysqli_query($conn , $sql);
    $num = mysqli_num_rows($result);
    if($num == 0){
        $sql = "INSERT INTO `signup`( `username`, `email`, `password`) VALUES ('$name','$email','$password')";
       $r= mysqli_query($conn , $sql);
       if($r){
        echo "<script>
                alert('insert successfully');
        </script>";
       }
       else{
        echo "insert unnsuccessfully";

       }
    }
    else{
        echo " <br> Data already inserted";
    }
}

?>
    </div>
    
 
</body>
</html>