<!-- This is the registration page for customers -->
<?php include('../config/constants.php'); ?>
<html>
<head>
<title>Website for buying books - Registration</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>
<div class="form">
<h1 class="text-center white-text">Register</h1>
<br><br>
<form action="" method="post" class="text-center">
<label class="white-text">Name</label>
<input type="text" name="name" placeholder="Enter Name" class="input-responsive" required><br><br>

<label class="white-text">Username</label>
<input type="text" name="username" placeholder="Enter Username" class="input-responsive" required><br><br>

<label class="white-text">Password</label>
<input type="password" name="password" placeholder="Enter Password" class="input-responsive" required><br><br>

<input type="submit" name="submit" value="Register" class="btn-new"><br><br>

<div class="link white-text">Already signed up? <a href="login.php" class="white-text">Login now</a></div>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn, $_POST['name']);
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, md5($_POST['password']));
    
    $sql="INSERT INTO users SET
    name='$name',
    password='$password',
    username='$username'
    ";
    $result=mysqli_query($conn, $sql) or die(mysqli_error());
    if($result==true){
        echo "You have been registered successfully!";
        header("location:".SITEURL.'partials-front/login.php');
    }else{
        echo "You couldn't be registered.";
    }
}else{
    echo "No information was submitted.";
}
?>