<?php include('menu.php'); ?>

<!-- Start of Book Search Section -->
<section class="book-search text-center">
	<div class="container">
		<form action="<?php echo SITEURL; ?>partials-front/book-search.php" method="post">
			<input class="search" type="search" name="search" placeholder="Search for a book..." required>
			<input type="submit" name="submit" value="Search" class="btn btn-primary">
		</form>
	</div>
</section>
<!-- End of Book Search Section -->

<!-- Start of Book Menu Section -->
<section class="book-menu">
	<div class="container">
	
		<h2 class="text-center">Book Menu</h2>
        <div class="grid-container">
		<?php 
		//Getting books from databse that are active and featured
        $sql="SELECT * FROM book WHERE active='Yes'";
        
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
                
                <div class="grid-item">
                <!--  <div class="book-menu-box">-->
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
        		<!--  </div> -->
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
