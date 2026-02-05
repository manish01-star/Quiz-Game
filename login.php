<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        body {
            display: flex;
            margin-top: 40px;
            justify-content: center;
            background-color: rgb(240, 239, 239);
        }
        .box {
            height: 480px; 
            width: 400px;
            padding: 40px;
            background-color: white;
            box-shadow: 1px 1px 12px rgb(138, 137, 137);
            border-radius: 5px;
        }
        .form-box {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            max-height: 60px;
            transition: max-height 0.2s;
        }
        #SignUp {
            margin-left: 15px;
            width: 40%;
            height: 40px;
            margin-top: 10px;
            background-color: #007bffa6;
            color: white;
            font-size: large;
            border-radius: 5px;
        }
        #login {
            margin-left: 50px;
            width: 40%;
            height: 40px;
            margin-top: 10px;
            background-color: #c300ffab;
            color: white;
            font-size: large;
            border-radius: 5px;
        }
        input {
            margin-top: 5px;
            height: 30px;
            background-color: transparent;
            border: 2px solid rgba(97, 96, 96, 0.329);
            border-radius: 4px;
        }
        label {
            color: rgba(85, 84, 84, 0.979);
        }
        form {
            height: 330px; 
        }
        .checkbox-label {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }
        .checkbox-label input {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <div class="box">
        <center><h1 id="title">Log In</h1></center>
        <form action="login.php" id="form" method="post">
            <div id="name-field">
                <div class="form-box name">
                    <label for="name" id="nameLable">UserName:</label>
                    <input type="text" id="UserName" name="name1" required>
                    <span class="name"></span>
                </div>
            </div>

            <div class="form-box">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <span class="email"></span>
            </div>

            <div class="form-box">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="password"></span>
            </div>

            <div class="checkbox-label">
                <input type="checkbox" id="admin" name="admin">
                <label for="admin">Admin</label>
            </div>

            <button id="SignUp" onclick="location.href='signup.php'">SignUp</button>
            <button id="login" type="submit">Log In</button>
        </form>
    </div>

</body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");

    $name = $_POST['name1'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `signup` WHERE username = '$name' AND email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    $sql2 = "SELECT * FROM `admin` WHERE username = '$name' AND email = '$email'";
    $result2 = mysqli_query($conn, $sql2);
    $num2 = mysqli_num_rows($result2);

    if (isset($_POST['admin'])) {
        if ($num2 !== 0) {
            $_SESSION["adminname"] = $name;
            $_SESSION['adminemail'] = $email;

            if (!isset($_SESSION['admindate'])) {
                $_SESSION['admindate'] = date('Y-m-d');
            }

            header('location: dasbord.php?subject=gk');
            exit();
        } else {
            echo "Admin data not found";
        }
    } else {
        if ($num !== 0) {
            $_SESSION["username"] = $name;
            $_SESSION['email'] = $email;

            if (!isset($_SESSION['date'])) {
                $_SESSION['date'] = date('Y-m-d');
            }

            header('location: profile.php');
            exit();
        } else {
            echo "Data not found. Please check your username and email or sign up.";
        }
    }
}
?>
