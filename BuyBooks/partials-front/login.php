<!-- This is the customer's login -->
<?php include('../config/constants.php'); ?>
<html>
	<head>
		<title>Website for buying books - Login</title>
		<link rel="stylesheet" href="../CSS/admin.css"></head>
	
	<body class="frontend">
		<div class="form">
			<h1 class="text-center white-text">Login</h1>
			
			<?php 
			     if(isset($_SESSION['login-users'])) {
			         echo $_SESSION['login-users']; //Displaying session
			         unset($_SESSION['login-users']); //Removing session
			     }
			     if(isset($_SESSION['no-login-message-users'])) {
			         echo $_SESSION['no-login-message-users']; //Displaying session
			         unset($_SESSION['no-login-message-users']); //Removing session
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
			<div class="link white-text">Not yet signed up? <a href="register.php" class="white-text">Signup now</a></div>
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
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    
    //Execute query
    $res=mysqli_query($conn, $sql) or die(mysqli_error());
    
    //Count rows to check whether the user exists
    $count=mysqli_num_rows($res);
    
    //Check if query execution was successful
    if($count==1){
        //User available and login was successful
        $_SESSION['login-users']="<div class='success'>Login is successful!</div>";
        $_SESSION['user']=$username;
        
        //Redirecting to Home page
        header("location:".SITEURL.'partials-front/index.php');
    }else{
        //User is not available and login failed
        $_SESSION['login-users']="<div class='error'>Invalid username or password.</div>";
        //Redirecting to Login page
        header("location:".SITEURL.'partials-front/login.php');
    }
}
?>
