<?php include('menu.php'); ?>

<!-- Start of categories Section -->
<section class="book-categories">
	<div class="container">
	
		<h2 class="text-center">Explore Books</h2>
		<p class="text-center">Click on the different competitive exams below and get the complete list of available books.</p>
		<br>
		<div class="grid-container">
		<?php 
		//Display all the categories that are active
		$sql="SELECT * FROM category WHERE active='Yes'";
		
		//Execute the query
		$res=mysqli_query($conn, $sql);
		
		//Count the rows
		$count=mysqli_num_rows($res);
		
		//Check if categories are available
		if($count>0)
		{
		    //Categories are available
		    while($row=mysqli_fetch_assoc($res))
		    {
		        //Get the values
		        $id=$row['id'];
		        $title=$row['title'];
		        $image_name=$row['image_name'];
		        ?>
		        
		        <a href="category-books.php?category_id=<?php echo $id; ?>">
        		<div class="grid-item">
        			<?php 
        			     if($image_name=="")
        			     {
        			         //Image is not available
        			         echo "<div class='error'>Image not found.</div>";
        			     }
        			     else 
        			     {
        			         //Image is available
        			         ?>
        			         <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="80" height="40">
        			         <?php 
        			     }
        			?>
        			
        			<!--  <h3 class="float-text text-white"><?php echo $title; ?></h3>-->
        		</div>
        		</a>
		        
		        <?php 
		    }
		}
		else 
		{
		    //Categories are not available
		    echo "<div class='error'>Category not found.</div>";
		}
		?>
		
		<div class="clearfix"></div>
		</div>
	</div>
</section>
<!-- End of categories Section -->

<?php include('footer.php'); ?>