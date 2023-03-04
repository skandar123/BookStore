<?php include('partials/menu.php'); ?>

<div class="main-content">
			<div class="wrapper">
				<h1 class="text-center">Update Admin</h1>
				
				<?php 
				//get the id of admin to be updated
				$id=$_GET['id'];
				
				//SQL query to update admin
				$sql="SELECT * FROM admin WHERE id=$id";
				
				//Execute query
				$res=mysqli_query($conn, $sql);
				
				//Check if the query execution was successful
				if($res==true)
				{
				    
				    //Check if the data is available
				    $count=mysqli_num_rows($res);
				    
				    //Check if we have admin data
				    if($count==1){
				        //Get details
				        $row=mysqli_fetch_assoc($res);
				        
				        $name=$row['name'];
				        $username=$row['username'];
				    }else{
				        //Redirecting to Manage Admin page
				        header("location:".SITEURL.'admin/manage-admin.php');
				    }
				}
				?>
				<div class="special">
				<form action="" method="post">
							<label>Name</label>
							<input type="text" name="name" value="<?php echo $name; ?>">
						
							<label>Username</label>
							<input type="text" name="username" value="<?php echo $username; ?>">
						
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="submit" name="submit" value="Update Admin" class="btn-new">
							
				</form>
				</div>
			</div>
</div>

<?php 
    //Check whether the submit button is clicked
if(isset($_POST['submit'])){
    
    //Get data from form
    $id=$_POST['id'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    
    
    //SQL query to save data to database
    $sql="UPDATE admin SET
    name='$name',
    username='$username'
    WHERE id='$id'
";
    
    //Execute query
    $res=mysqli_query($conn, $sql) or die(mysqli_error());
    
    //Check if query execution was successful
    if($res==TRUE){
        //Data inserted
        $_SESSION['update']="<div class='success'>Admin updated.</div>";
        //Redirecting to Manage Admin page
        header("location:".SITEURL.'admin/manage-admin.php');
    }else{
        //Insertion Failed
        $_SESSION['update']="<div class='error'>Failed to update admin.</div>";
        //Redirecting to Add Admin page
        header("location:".SITEURL.'admin/manage-admin.php');
    }
}
?>

<?php include('partials/footer.php')?>	
