<?php 
    include('../config/constants.php');
    include('login-check.php');
?>
<html>
	<head>
		<title>Website for buying books - Home Page</title>
		<link rel="stylesheet" href="../CSS/admin.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
	    <link rel="icon" type="image/x-icon" href="../images/bookstore_logo.png">
	</head>
	<body>
	<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
		<!-- Menu -->
		<section class="navbar">
			<div class="container">
				<ul>
				<li>
					<a href="#">
					 <img src="../images/bookstore_logo.png" alt="Bookstore logo" width="60" height="20">
					</a>
				</li>
				<li><a class="<?= ($activePage == 'index') ? 'active':''; ?>" href="index.php">Home</a></li>
				<li><a class="<?= ($activePage == 'manage-admin') ? 'active':''; ?>" href="manage-admin.php">Admin</a></li>
				<li><a class="<?= ($activePage == 'manage-category') ? 'active':''; ?>" href="manage-category.php">Category</a></li>
				<li><a class="<?= ($activePage == 'manage-book') ? 'active':''; ?>" href="manage-book.php">Book</a></li>
				<li><a class="<?= ($activePage == 'manage-order') ? 'active':''; ?>" href="manage-order.php">Order</a></li>
				<li style="float:right"><a class="<?= ($activePage == 'logout') ? 'active':''; ?>" href="logout.php">Logout</a></li>
				</ul>
			</div>
		</section>
		
		
