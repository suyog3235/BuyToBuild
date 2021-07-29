<?php

//start session

session_start();



//constats to use
define('SITEURL','http://localhost/project/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','($@#()*2=6@SuYoG');
define('DB_NAME', 'hiretobuild');

$conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);




?>