
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
            
           
            <h2>Change Password.</h2><br>

                <label>Email</label>
            <br>
                <input type="email" class="box" name="email" placeholder="email" required />
            <br><br>
                <label>New Password</label>
            <br>
                <input  type="password" maxlength="8" class="box" name="npassword" placeholder="Password" required />
            <br><br>
            <label>Confirm Password</label>
            <br>
                <input  type="password" maxlength="8" class="box" name="cpassword" placeholder="Password" required />
            <br><br>
                <button name="submit"  type="submit" class="btn">Change</button>
            <br><br>
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

    $email =$_POST['email'];
    $new_password = md5($_POST['npassword']);
    $confirm_password =md5($_POST['cpassword']);


    $sql = "SELECT * FROM user WHERE email='$email'";


    $res = mysqli_query($conn, $sql);

   

    if($res == TRUE)
    {
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            if($new_password == $confirm_password)
            {
                $sql2 = "UPDATE user SET password='$new_password'";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==TRUE)
                {
                    ?>

                    <script type="text/javascript">
                
                        alert("Password changed successfully.");
                       
                        window.location.replace("login.php");
                        
                    </script>
        
                <?php
                }
                else
                {
                    ?>

                    <script type="text/javascript">
                
                        alert("Failed To change the password.");
                       
                        window.location.replace("login.php");
                        
                    </script>
        
                <?php
                }
            }
            else
            {
                ?>

                <script type="text/javascript">
            
                    alert("passwords does not  match try again.");
                   
                    window.location.replace("forgotpass.php");
                    
                </script>
    
            <?php
            }
        }
    }
    else
    {
        ?>

        <script type="text/javascript">
    
            alert("User not found signup!!");
           
            window.location.replace("signup.php");
            
        </script>
    
        <?php
    }

}

?>
