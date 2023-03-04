<?php include('partials/menu.php')?>

<!-- Content -->
		<div class="main-content">
			<div class="wrapper">
				<h1>Dashboard</h1>
			<?php 
			     if(isset($_SESSION['login'])) {
			         echo $_SESSION['login']; //Displaying session
			         unset($_SESSION['login']); //Removing session
			     }
			?>
			<br><br>
			
				<div class="col-4 text-center">
				
				<?php 
				//SQL Query
				$sql="SELECT * FROM category";
				//Execute Query
				$res=mysqli_query($conn, $sql);
				//Count rows
				$count=mysqli_num_rows($res);
				?>
				
				<h1><?php echo $count; ?></h1>
				<br />
				Categories
				</div>
				
				<div class="col-4 text-center">
				
				<?php 
				//SQL Query
				$sql2="SELECT * FROM book";
				//Execute Query
				$res2=mysqli_query($conn, $sql2);
				//Count rows
				$count2=mysqli_num_rows($res2);
				?>
				
				<h1><?php echo $count2; ?></h1><br />
				Books
				</div>
				<div class="col-4 text-center">
				
				<?php 
				//SQL Query
				$sql3="SELECT * FROM order_book";
				//Execute Query
				$res3=mysqli_query($conn, $sql3);
				//Count rows
				$count3=mysqli_num_rows($res3);
				?>
				
				<h1><?php echo $count3; ?></h1><br />
				Total Orders
				</div>
				
				<div class="col-4 text-center">
				
				<?php 
				//SQL Query to get total revenue generated
				$sql4="SELECT SUM(total) AS Total FROM order_book WHERE status='Delivered'";
				
				//Execute Query
				$res4=mysqli_query($conn, $sql4);
				
				//Get the value
				$row4=mysqli_fetch_assoc($res4);
				
				//Get the total revenue
				$total_revenue=$row4['Total'];
				
				?>
				
				<h1><i class="fas fa-rupee-sign"></i><?php echo $total_revenue; ?></h1><br />
				Revenue Generated
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		
<?php include('partials/footer.php')?>		

