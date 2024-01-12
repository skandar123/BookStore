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
<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<link rel="icon" type="image/x-icon" href="../images/bookstore_logo.png">
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
					<a class="<?= ($activePage == 'about') ? 'active':''; ?>" href="about.php">About Us</a>
				</li>
				<li>
					<a class="<?= ($activePage == 'gallery') ? 'active':''; ?>" href="gallery.php">Gallery</a>
				</li>
				<li class="dropdown">
					<a class="dropbtn" href="categories.php">Categories</a>
					<div class="dropdown-content">
      					<a href="category-books.php?category_id=13">GATE</a>
      					<a href="category-books.php?category_id=14">GRE</a>
      					<a href="category-books.php?category_id=15">TOEFL</a>
      					<a href="category-books.php?category_id=16">IELTS</a>
      					<a href="category-books.php?category_id=17">IITJEE</a>
      					<a href="category-books.php?category_id=18">JEE</a>
      					<a href="category-books.php?category_id=19">MHT-CET</a>
    				</div>
				</li>
				<li>
					<a class="<?= ($activePage == 'books') ? 'active':''; ?>" href="books.php">Books</a>
				</li>
			    <li>
					<a class="<?= ($activePage == 'contact') ? 'active':''; ?>" href="contact.php">Contact</a>
				</li>
				<li style="float:right">
					<a class="<?= ($activePage == 'logout') ? 'active':''; ?>" href="logout.php">Logout</a>
				</li>
		</ul>
	</div>
	</section>
	<!-- End of Navbar Section -->
