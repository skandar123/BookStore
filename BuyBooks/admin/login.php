<?php include('../config/constants.php'); ?>
<html>
	<head>
		<title>Website for buying books - Login</title>
		<link rel="stylesheet" href="../CSS/admin.css"></head>
	
	<body class="backend">
		<div class="form">
			<h1 class="text-center white-text">Login</h1>
			
			<?php 
			     if(isset($_SESSION['login'])) {
			         echo $_SESSION['login']; //Displaying session
			         unset($_SESSION['login']); //Removing session
			     }
			     if(isset($_SESSION['no-login-message'])) {
			         echo $_SESSION['no-login-message']; //Displaying session
			         unset($_SESSION['no-login-message']); //Removing session
			     }
			?>
			  <br><br>
			
			<!-- Login form starts here -->
			<form action="" method="post" class="text-center">
			<label class="white-text">Username</label>
			<input type="text" name="username" placeholder="Enter Username" class="input-responsive"><br><br>
			
			<label class="white-text">Password</label>
			<input type="password" name="password" placeholder="Enter Password" class="input-responsive"><br><br>
			
			<input type="submit" name="submit" value="Login" class="btn-new"><br><br>
			
			</form>
			<!-- Login form ends here -->
			</div> 
	</body>
</html>
<?php 
//Check whether submit button is clicked or not
if(isset($_POST['submit'])){
    
    //Get data from form
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, md5($_POST['password']));
    
    //SQL query to check if the user with username and password exists
    $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    
    //Execute query
    $res=mysqli_query($conn, $sql) or die(mysqli_error());
    
    //Count rows to check whether the user exists
    $count=mysqli_num_rows($res);
    
    //Check if query execution was successful
    if($count==1){
        //User available and login was successful
        $_SESSION['login']="<div class='success'>Login is successful!</div>";
        $_SESSION['user']=$username;
        
        //Redirecting to Home page
        header("location:".SITEURL.'admin/index.php');
    }else{
        //User is not available and login failed
        $_SESSION['login']="<div class='error'>Invalid username or password.</div>";
        //Redirecting to Login page
        header("location:".SITEURL.'admin/login.php');
    }
}
?>
