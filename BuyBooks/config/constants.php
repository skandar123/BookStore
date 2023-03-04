<?php
//Start session
session_start();

//Store connection details
define('SITEURL', 'http://localhost/BuyBooks/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'BookStore');

//Database Connection
$conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$db_select=mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>