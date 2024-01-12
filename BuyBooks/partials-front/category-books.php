<?php include('menu.php'); ?>

<?php
//Check whether id is passed or not
if(isset($_GET['category_id']))
{
    //Category id is set and get the id
    $category_id=$_GET['category_id'];
    
    //Get the category title based on category id
    $sql="SELECT title,image_name FROM category WHERE id=$category_id";
    
    //Execute the query
    $res=mysqli_query($conn, $sql);
    
    //Get the value from database
    $row=mysqli_fetch_assoc($res);
    
    //Get the title
    $category_title=$row['title'];
    $category_image=$row['image_name'];
} 
else 
{
    //Category is not passed
    //Redirect to home page
    header('location:'.SITEURL.'partials-front/index.php');
}
?>

<!-- Start of Book Search Section -->
<section class="book-search text-center">
	<div class="container">
	    <img src="<?php echo SITEURL; ?>images/category/<?php echo $category_image; ?>" width="80" height="40"><br>
		<h2><?php echo $category_title; ?> exam books</h2>
	</div>
</section>
<!-- End of Book Search Section -->

<!-- Start of Book Menu Section -->
<section class="book-menu">
	<div class="container">

		<?php 
		//Create SQL query to get books based on selected category
        $sql2="SELECT * FROM book WHERE category_id=$category_id";
        
        //Execute the query
        $res2=mysqli_query($conn, $sql2);
        
        //Count rows
        $count2=mysqli_num_rows($res2);
        
        //Check if book is available
        if($count2>0)
        {
            //Book is available
            while($row2=mysqli_fetch_assoc($res2))
            {
                $id=$row2['id'];
                $title=$row2['title'];
                $price=$row2['price'];
                $description=$row2['description'];
                $image_name=$row2['image_name'];
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
        		   <br>
        			<div class="book-menu-desc">
        				<h4><?php echo $title; ?></h4> 
        				
        				<p class="book-detail">
        					<?php echo $description; ?>
        				</p>
        				<br>
        				
        				<p class="book-price"><i class="fas fa-rupee-sign"></i>
        				<?php echo $price; ?></p><br>
        				
        			
        				<a href="<?php echo SITEURL; ?>partials-front/order.php?book_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
        			</div>
        		</div>
                <br>
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
