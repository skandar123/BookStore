<?php include('menu.php'); ?>

<!-- Start of Book Search Section -->
<section class="book-search text-center">
	<div class="container">
		<?php
		
		  //Get the search keyword
		$search=mysqli_real_escape_string($conn, $_POST['search']);
		?>
		<h2>Books based on your search <b>"<?php echo $search; ?>"</b></h2>
	</div>
</section>
<!-- End of Book Search Section -->

<!-- Start of Book Menu Section -->
<section class="book-menu">
	<div class="container">
		<h3 class="text-center">Book Menu</h3>

		<?php
		
		//SQL Query to get books based on search keyword
        $sql="SELECT * FROM book WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        
        //Execute the query
        $res=mysqli_query($conn, $sql);
        
        //Count rows
        $count=mysqli_num_rows($res);
        
        //Check if book is available
        if($count>0)
        {
            //Book is available
            while($row=mysqli_fetch_assoc($res))
            {
                //Get all the values
                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $description=$row['description'];
                $image_name=$row['image_name'];
                ?>
                
                <div class="book-menu-box">
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
        		
        			<div class="book-menu-desc">
        				<h4><?php echo $title; ?></h4>
        				<p class="book-price">Rs.<?php echo $price; ?></p>
        				<p class="book-detail">
        					<?php echo $description; ?>
        				</p>
        				<br>
        			
        				<a href="<?php echo SITEURL; ?>partials-front/order.php" class="btn btn-primary">Order Now</a>
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
	
</section>
<!-- End of Book Menu Section -->

<?php include('footer.php'); ?>