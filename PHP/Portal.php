<?php

include("connection.php");

session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data==false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from login where username='".$username."' AND password='".$password."'";

    $result = mysqli_query($data,$sql);
    $row = mysqli_fetch_array($result);

    if($row !==null && $row["usertype"]=="user"){
        $_SESSION["username"]=$username;

        header("location:userpage.php");
    }
    elseif($row !==null && $row["usertype"]=="admin"){
        $_SESSION["username"]=$username;
        header("location:adminpage.php");    
    }
    elseif($row !==null && $row["usertype"]=="student"){
            $_SESSION["username"]=$username;
            header("location:studentpage.php");    }
    else{
        echo '<script>
            window.location.href = "Portal.php";
            alert ("BOBO MALI!")
            </script>';
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingLab</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="Bts.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
   <div class="login-form">
    <h1><b>Monalisa Academy Login Portal</b></h1>
    <div class="container">
        <div class="main">
            <div class="content">
                <h1><b>Monalisa Academy</b></h1>
                <h2><b>Log In</b></h2>
                <div class="box">
                <form action="" method="post">
                    <input type="text" name="" placeholder="User Name" required autofocus="">
                    <input type="password" name="" placeholder="Password" required autofocus="">
                    <div class="hov">
                    <button class="btn" type="submit">Login</button>
                </div>
                </form>

            </div>
            </div>
            <div class="form-img">
                <img src="MonaLogo.png" alt="">
            </div>
        </div>
    </div>
   </div>
    <script src="SignReg.js"></script>
</body>
</html>

        <script>
            let eyeicon = document.getElementById("eyeicon");
            let password = document.getElementById("password");
            eyeicon.onclick = function() {
                if(password.type == "password") {
                    password.type = text;
                }else
                password.type = "password"
            } 
            </script>

    </body>
</html>