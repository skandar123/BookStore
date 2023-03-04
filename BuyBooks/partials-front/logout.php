<!-- This is the customer's logout -->
<?php

//Including constants.php for SITEURL
include('../config/constants.php');

//Destroying the current session
session_destroy();

//Redirecting to login page
header('location:'.SITEURL.'partials-front/login.php');
?>