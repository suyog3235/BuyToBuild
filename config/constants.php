<?php

//start session

session_start();



//constats to use
define('SITEURL','http://localhost/project/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','db-password');
define('DB_NAME', 'db-name');

$conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);




?>
