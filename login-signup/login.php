
<?php include('../config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        
    <form action="" method="POST">

        
            <img src="../images/loginbg.png" alt="logo" class="bgimg">
        
        
        <div class="text">
            
           
            <h2>LOGIN.</h2><br>

                <label>Username</label>
            <br>
                <input type="text" class="box" name="username" placeholder="Username" required />
            <br><br>
                <label>Password</label>
            <br>
                <input  type="password" maxlength="8" class="box" name="password" placeholder="Password" required />
            <br><br>
                <button name="submit"  type="submit" class="btn">Login</button>
            <br><br>
            <a href="forgotpass.php">Forgot password?</a>
            <a href="signup.php" class="signup">New?SignUp.</a>
        </div>
    </form>
   
</body>
</html>

<style>

/*css for body*/
body
{

    background-color: #0b172a;
    font-family: Arial, Helvetica, sans-serif;
    margin: 6% 34%;
    overflow: hidden;

}


/*css for box*/
div
{
    border: 5px solid #bc4123;
    width: 26rem;
    height: 24rem;
}

/*css for heading*/
div h2
{
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    color: white;
}

/*css for labels username and password*/
div label
{
    font-weight: 1px;
    margin: 0 4.6%;
    color: white;
    
}

/*css for input boxs*/
div .box{
    margin: 0 4.4%;
    size: 50rem;
    border: none;
    border-radius: 10px;
    width: 20rem;
    height: 2rem;
    padding: 5px 32px;


}

/*css for buttons*/
div .btn
{
  background-color: #bc4123; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 0 37%;
  border-radius: 10px;
}

button:hover
{
    background-color: black;
}

/*css for ancher signup and forgot password*/
div a
{
    margin: 0 34%;
    text-decoration: none;
    color: #9dc8e4;
}
div a:hover
{
    color: #d1d8e0;
}
.signup
{
    margin: 0 38%;
    text-decoration: none;
    padding: 1px 1px;
}

/*css for logo*/
.bgimg
{
    width: 60%;
    margin-top: 0px;
    margin-left: 10%;
    padding: 10px 20px;
}
</style>


<?php


if(isset($_POST['submit']))
{

    $username = $_POST['username'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM user WHERE username='$username'  AND password='$password'";


    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        $_SESSION['user']=$username;
        
        ?>

            <script type="text/javascript">
        
                alert("Login successfull.");
                window.location.replace("../index.php");
                
            </script>

        <?php
    }
    else
    {
        ?>

            <script type="text/javascript">
            
                alert("Login failed please check username and password again.");
                window.location.replace("login.php");
            
            </script>

        <?php
    }

}

?>