<?php

if(!isset($_SESSION['user']))
{
   ?>

            <script type="text/javascript">
                
                alert("please login to access the site");
            
                window.location.replace("login-signup/login.php");
                
            </script>
   
   <?php
}




?>