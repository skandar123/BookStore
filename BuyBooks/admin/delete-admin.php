<?php

//Including connection file
include('../config/constants.php');

//get the id of admin to be deleted
$id=$_GET['id'];

//SQL query to delete admin
$sql="DELETE FROM admin WHERE id=$id";

//Execute query
$res=mysqli_query($conn, $sql);

//Check if the query execution was successful
if($res==true)
{
    //query execution was successful
    $_SESSION['delete']="<div class='success'>Admin deleted successfully.</div>";
    
    //Redirecting to Manage Admin page
    header("location:".SITEURL.'admin/manage-admin.php');
}else{
    //query execution failed
    $_SESSION['delete']="<div class='error'>Failed to delete admin.</div>";
    
    //Redirecting to Manage Admin page
    header("location:".SITEURL.'admin/manage-admin.php');
}
?>