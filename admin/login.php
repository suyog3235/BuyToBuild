<?php include('../config/constants.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <a href="../index.php"><img src="../images/loginbg.png" class="i"></a>
    <div class="loginborder">
    <div class="login">
        <h1 class="center">Admin Login</h1>
            <br>
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);   
                }
               
            ?>

            <br>
        <form action="" method="POST" class="">
           <label class="l">Username</label>
            <br>
            <input type="text" name="username" class="border" placeholder="Enter Username">
            <br><br>
            <label class="l">Password</label>
            <br>
            <input type="password" name="password" class="border" placeholder="Enter Password">
            <br><br>
            <input type="submit" name="submit" value="Login" class="btn">
            <br><br>
        </form>
        
    </div> 
    </div>   
</body>
</html>
<style>

h1
{
    margin-top: 3%;
    color: #EAEFD3;
    
}

.i
{
    width: 20%;
    margin: 10% 0 0 40%;
    padding: 0.5%;
}
.loginborder
{
    border: 4px solid #F2E9DC;
    width: 30%;
    margin: 0 0 0 35%;
}

body
{
    background-color: #708D81;
    font-family: 'Times New Roman', Times, serif;
}

.border
{
    border: none;
    border-radius: 5px;
    width: 85%;
    padding: 2%;
    margin: 0 0 0 4.8%;
}

.btn
{
    margin-left: 33%;
    padding: 1.5%;
    background-color: #BEEDAA;
    border: none;
    border-radius: 5px;
    text-align: center;
    width: 30%;
    

}
.btn:hover
{
    background-color: #C0DA74;
}

.username,.password
{
    color : white;
}

.l
{
    
    padding-bottom: 2.5%;
    color: white;
    margin-left: 6%;
}
</style>



<?php

    if(isset($_POST['submit']))
    {
         $username = $_POST['username'];
         $password = md5($_POST['password']);

         //check if match to database

         $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";


         $res = mysqli_query($conn, $sql);

         $count=mysqli_num_rows($res);

         if($count == 1)
         {
            $_SESSION['login'] = "Login successfull";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'admin/');
         }
         else
         {
            $_SESSION['login'] = "<div class='center'>Login Failed.</div>";
            header('location:'.SITEURL.'admin/login.php');
         }

    }


?>



















