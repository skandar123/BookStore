<?php

//Including connection file
include('../config/constants.php');

//Check if the id and image_name is set
if(isset($_GET['id']) AND isset($_GET['image_name'])){
    //get the id to delete
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    
    //If the image file is available, remove it
    if($image_name!="")
    {
        $path="../images/book/".$image_name;
        $remove=unlink($path);
        
        if($remove==false)
        {
            //Set session remove
            $_SESSION['remove']="<div class='error'>Failed to remove book image.</div>";
            
            //Redirecting to Manage Category page
            header("location:".SITEURL.'admin/manage-book.php');
            
            //Stop the process
            die();
        }
    }
    //Delete data from database
    //SQL query to delete category
    $sql="DELETE FROM book WHERE id=$id";
    
    //Execute query
    $res=mysqli_query($conn, $sql);
    
    //Check if the query execution was successful
    if($res==true)
    {
        //query execution was successful
        $_SESSION['delete']="<div class='success'>Book deleted successfully.</div>";
        
        //Redirecting to Manage Book page
        header("location:".SITEURL.'admin/manage-book.php');
    }else{
        //query execution failed
        $_SESSION['delete']="<div class='error'>Failed to delete book.</div>";
        
        //Redirecting to Manage Book page
        header("location:".SITEURL.'admin/manage-book.php');
    }
}
else 
{
    //query execution failed
    $_SESSION['unauthorized']="<div class='error'>Unauthorized access.</div>";
    //Redirecting to Manage Book page
    header("location:".SITEURL.'admin/manage-book.php');
}
?>