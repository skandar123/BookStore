<?php include('menu.php'); ?>

<!-- Start of Book Search Section -->
<section class="book-search text-center">
	<div class="container">
		<form action="<?php echo SITEURL; ?>partials-front/book-search.php" method="post">
			<input class="search" type="search" name="search" placeholder="Search for a book..." required>
			<input type="submit" name="submit" value="Search" class="btn btn-primary">
		</form>
		<br>
	</div>
</section>
<!-- End of Book Search Section -->

<?php 
if(isset($_SESSION['order']))
{
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<!-- Start of categories Section -->
<section class="categories">
	<div class="container">
	    <div>
		<h2 class="text-center text-white">Explore Books</h2>
		<p class="text-center text-white">Get books of different competitive exams at a cheaper price. Click on the different competitive exams below to view and order all the books available for the selected exam.</p>
		<br>
		</div>
		<div class="grid-container">
		<?php 
		//To display data from database
		$sql="SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3";
		
		//Execute the query
		$res=mysqli_query($conn, $sql);
		
		//Count rows to check if the category is available
		$count=mysqli_num_rows($res);
		
		if($count>0)
		{
		    //Categories are available
		    while($row=mysqli_fetch_assoc($res))
		    {
		        $id=$row['id'];
		        $title=$row['title'];
		        $image_name=$row['image_name'];
		        ?>
		        
        		<a href="<?php echo SITEURL; ?>partials-front/category-books.php?category_id=<?php echo $id; ?>">
        		<div class="grid-item">
        			 <h3><?php echo $title; ?></h3>  
        		</div>
        		</a>
        		
        		<?php 
		    }
		}
		else 
		{
		    //Categories are not available
		    echo "<div class='error'>Category not added.</div>";
		}
		?>
		
		<div class="clearfix"></div>
		</div>
	</div>
</section>
<!-- End of categories Section -->

<!-- Start of Book Menu Section -->
<section class="book-menu">
	<div class="container">
	
		<h2 class="text-center">Book Menu</h2>
		<div class="grid-container">
		<?php 
		//Getting books from databse that are active and featured
        $sql2="SELECT * FROM book WHERE active='Yes' AND featured='Yes' LIMIT 3";
        
        //Execute the query
        $res2=mysqli_query($conn, $sql2);
        
        //Count rows
        $count2=mysqli_num_rows($res2);
        
        //Check if book is available
        if($count2>0)
        {
            //Book is available
            while($row=mysqli_fetch_assoc($res2))
            {
                //Get all the values
                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $description=$row['description'];
                $image_name=$row['image_name'];
                ?>
                <div class="grid-item">
        			<div class="book-menu-img">
        				<?php 
        				    //Check if image is available
        				    if($image_name=="")
        				    {
        				        //Image is not available
        				        echo "<div class='error'>Image is not available.</div>";
        				    }
        				    else 
        				    {
        				        //Image is available
        				        ?>
        			         	<img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" width="150" height="150">
        			        	<?php 
        				    }
        				?>
        				
        			</div>
        		    <br>
        			<div class="book-menu-desc">
        				<h4><?php echo $title; ?></h4><br>
        				
        				<div class="book-detail">
        					<?php echo $description; ?>
        				</div>
        				<br>
        				
        				<p class="book-price"><i class="fas fa-rupee-sign"></i>
        				<?php echo $price; ?></p><br>
        				
        			
        				<a href="<?php echo SITEURL; ?>partials-front/order.php?book_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
        			</div>
                </div>
                <?php 
            }
        }
        else 
        {
            //Book is not available
            echo "<div class='error'>Book is not available.</div>";
        }
        ?>
        
		<div class="clearfix"></div>
		</div>
	</div>
</section>
<!-- End of Book Menu Section -->

<?php include('footer.php'); ?>