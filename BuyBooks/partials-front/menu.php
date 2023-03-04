<!-- Menu for customer's login -->
<?php 
    include('../config/constants.php');
    include('../partials-front/login-check.php');
?>
<!DOCKTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
<!-- To make website responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online BookStore</title>

<!-- Link to CSS file -->
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
    <!-- Start of Navbar Section -->
	<section class="navbar">
	<div class="container">
		<ul>	
				<li>
					<a href="#">
					 <img src="../images/bookstore_logo.png" alt="Bookstore logo" width="60" height="20">
					</a>
				</li>
				<li>
					<a class="<?= ($activePage == 'index') ? 'active':''; ?>" href="index.php">Home</a>
				</li>
				<li>
					<a class="<?= ($activePage == 'categories') ? 'active':''; ?>" href="categories.php">Categories</a>
				</li>
				<li>
					<a class="<?= ($activePage == 'books') ? 'active':''; ?>" href="books.php">Books</a>
				</li>
			    <li>
					<a class="<?= ($activePage == 'contact') ? 'active':''; ?>" href="contact.php">Contact</a>
				</li>
				<li>
					<a class="<?= ($activePage == 'logout') ? 'active':''; ?>" href="logout.php">Logout</a>
				</li>
		</ul>
	</div>
	</section>
	<!-- End of Navbar Section -->
