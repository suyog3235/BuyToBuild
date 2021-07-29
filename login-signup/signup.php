<?php include('../config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <img src="../images/loginbg.png" class="bg">
    <form action="" method="POST" >
       
        <div>

            <h2>Signup.</h2>

                <label for="">Name</label>
            <br>
                <input name="name" type="text" placeholder="Name" required />
            <br><br>
                <label for="">E-mail</label>
            <br>
                <input type="text" name="email" placeholder="Email" required />
            <br><br>
                <label for="">Mobile no.</label>
            <br>
                <input type="num" name="number" maxlength="10" placeholder="Mobile number" required />
            <br><br>
                <label for="">Password</label>
            <br>
                <input type="password" name="password" maxlength="8" placeholder="Password" required />
            <br><br>
                <label for="">Confirm Password</label>
            <br>
                <input type="password" name="cfmpassword" maxlength="8" placeholder=" confirm Password" required />
            <br><br>
                <button type="submit" name="submit">Signup</button> 
            
         </div>

       
    </form>
</body>
</html>


<?php

if(isset($_POST['submit']))
{
   
    $username =$_POST['name'];
    $email = $_POST['email'];
    $mobileno = $_POST['number'];
    $password =md5($_POST['password']);
    $cfmpassword =md5($_POST['cfmpassword']);
    

    $sql = "INSERT INTO user SET
            username = '$username',
            email ='$email',
            mobileno='$mobileno',
            password = '$password',
            cfmpassword = '$cfmpassword'";
    
    $res = mysqli_query($conn, $sql);
    
    if($res == TRUE)
    {
        ?>
            <script type="text/javascript"> 
                alert("SignUP Successfull continue to Login page.")
                window.location.href = "login.php";
            </script>
        <?php
    }
    else
    {
        ?>
            <script type="text/javascript"> 
                alert("SignUP failed please try gaain later :(")
                window.location.href = "login.php";
            </script>
        
        <?php
    }
}


?>
<style>

/*css for all*/
body
{
    overflow: hidden;
    background-color: #0b172a;
    font-family: Arial, Helvetica, sans-serif;
    margin: 3.5% 34%;
}

/*css for logo*/
img
{
    width: 60%;
    margin-top: 0%;
    margin-left: 18.6%;
    padding: 10px 20px;
}

/*css for div box*/
div
{
    border: 4px solid #bc4123;
    width: 30rem;
    height: 33rem;
    margin: 0% 1.4%;
}


/*css for signup head*/
h2
{
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    color: white;
}

/*css for label*/
label
{
    font-weight: 1px;
    margin: 0 9%;
    color: white;
}

/*css for input boxes*/
input
{
    margin: 0% 8%;
    size: 50rem;
    border: none;
    border-radius: 10px;
    width: 21rem;
    height: 2rem;
    padding: 5px 32px;
}

/*css for button*/
button
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

</style>
