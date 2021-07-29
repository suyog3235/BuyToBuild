<?php

if(isset($_SESSION['user']) != true)
{
   // $_SESSION['no-login-message'] = "please login to access admin dashboard";
   // header('locatin:'.SITEURL.'../admin/login.php');

   ?>

            <script type="text/javascript">
                
                alert("please login to access admin dashboard");
            
                window.location.replace("login.php");
                
            </script>
   
   <?php
}




?>