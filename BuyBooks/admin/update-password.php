<?php include('partials/menu.php'); ?>

<div class="main-content">
			<div class="wrapper">
				<h1 class="text-center">Change Password</h1>
				<?php 
				if(isset($_GET['id'])){
				    $id=$_GET['id'];
				}
				?>
				<div class="special">
				<form action="" method="post">
							<label>Current Password</label>
							<input type="password" name="current_password" placeholder="Current Password" class="input-responsive">
						
							<label>New Password</label>
							<input type="password" name="new_password" placeholder="New Password" class="input-responsive">
						
							<label>Confirm Password</label>
							<input type="password" name="confirm_password" placeholder="Confirm Password" class="input-responsive">
						
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="submit" name="submit" value="Change Password" class="btn-new">
				</form>
				</div>
			</div>
</div>


<?php include('partials/footer.php')?>	

<?php 
//Check whether submit button is clicked or not
if(isset($_POST['submit'])){
    
    //Get data from form
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);
    
    //SQL query to save data to database
    $sql="SELECT * FROM admin WHERE id=$id AND password='$current_password'";
    
    //Execute query
    $res=mysqli_query($conn, $sql) or die(mysqli_error());
    
    //Check if query execution was successful
    if($res==TRUE){
        //Check if the data is available
        $count=mysqli_num_rows($res);
        
        //Check if we have user data
        if($count==1)
        {
            //User exists and password can be changed
            //Check if new password and confirm password match
            
            if($new_password==$confirm_password)
            {
                //Update password
                $sql2="UPDATE admin SET password='$new_password' WHERE id=$id";
                
                //Execute query
                $res2=mysqli_query($conn, $sql2);
                
                //Check whether the query has executed
                if($res2==true)
                {
                    //Password changed successfully
                    $_SESSION['change-pwd']="<div class='success'>Password changed successfully.</div>";
                    //Redirecting to Manage Admin page
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
                else{
                    //Error changing password
                    $_SESSION['change-pwd']="<div class='error'>Failed to change password.</div>";
                    //Redirecting to Manage Admin page
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //Password mismatch
                $_SESSION['pwd-not-match']="<div class='error'>Password did not match.</div>";
                //Redirecting to Manage Admin page
                header("location:".SITEURL.'admin/manage-admin.php');
            }
        }
        else
        {
            //User does not exist
            $_SESSION['user-not-found']="<div class='error'>User Not Found.</div>";
            //Redirecting to Manage Admin page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
    
}
?>
