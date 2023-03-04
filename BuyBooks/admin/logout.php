<?php

//Including constants.php for SITEURL
include('../config/constants.php');

//Destroying the current session
session_destroy();

//Redirecting to login page
header('location:'.SITEURL.'admin/login.php');
?>