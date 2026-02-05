<?php
session_start();
    if(!isset($_SESSION["username"])){
        header("Location:login.php");
        exit();
    }
//    if(isset($_POST["box"])){

       include("connet.php");
       $sql = "Select id , username , email , password from signup";
       $result = mysqli_query($conn , $sql);
       $num = mysqli_num_rows($result);
       if($num > 0){
           while($row=mysqli_fetch_assoc($result)) {
               echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "password: " . $row["password"]. "<br>";
             }
           }
            else {
             echo "0 results";
           }
           mysqli_close($conn);
//    }

        if(!isset($_POST["logout"])){
            session_destroy();
            header("Location:login.php");
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body{
            display: flex;
            margin-top: 40px;
            justify-content: center;
            background-color: rgb(240, 239, 239);
        }
        .box{
            height: 350px; 
            width: 400px;
            padding: 40px;
            background-color: white;
            box-shadow: 1px 1px 12px green;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .form-box{
            display: flex;
            flex-direction: column;
            margin-bottom: 0px;
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
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

    <div class="box" name="box">
        <form action="welcome.php" id="form" method="post">
              <div class="box2">
                  <h1 style="color:green">Login successfully</h1>
                  <button  type="button" id="login" onclick="location.href='login.php'" name="logout" >Logout</button>
              </div>
        </form>
    </div>

    <div class="showdata box">



    </div>
 
</body>
</html>