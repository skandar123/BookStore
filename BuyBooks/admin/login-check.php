<?php
//Check if the user is logged in or not
if(!isset($_SESSION['user']))
{
    //User is not logged in, so redirecting to login page
    $_SESSION['no-login-message']="<div class='error'>Please login to access the website.</div>";
    //Redirecting to login page
    header('location:'.SITEURL.'admin/login.php');
}
?>