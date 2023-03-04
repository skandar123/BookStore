<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1 class="text-center">Add Admin</h1>
		<div class="special">
			<form action="" method="post">
					<label>Name</label>
					<input type="text" name="name" placeholder="Enter Your Name" class="input-responsive">
					
					<label>Username</label>
					<input type="text" name="username" placeholder="Enter Your User Name" class="input-responsive">
					
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter Your Password" class="input-responsive">
					<input type="submit" name="submit" value="Add Admin" class="btn-new">
			</form>
		</div>
	</div>
</div>


<?php include('partials/footer.php')?>	

<?php 
//Process value from form and save in the database
//Check whether submit button is clicked or not
if(isset($_POST['submit'])){
    
    //Get data from form
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    
    //SQL query to save data to database
    $sql="INSERT INTO admin SET
    name='$name',
    username='$username',
    password='$password'
";
    
    //Execute query
    $res=mysqli_query($conn, $sql) or die(mysqli_error());
    
    //Check if query execution was successful
    if($res==TRUE){
        //Data inserted
        $_SESSION['add']="<div class='success'>Admin added</div>";
        //Redirecting to Manage Admin page
        header("location:".SITEURL.'admin/manage-admin.php');
    }else{
        //Insertion Failed
        $_SESSION['add']="<div class='error'>Failed to add admin</div>";
        //Redirecting to Add Admin page
        header("location:".SITEURL.'admin/add-admin.php');
    }
}
?>
