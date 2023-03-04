<?php include('menu.php');
//Check whether book id is set or not
if(isset($_GET['book_id']))
{
    //Get the book id and details of the selected book
    $book_id=$_GET['book_id'];
    
    //Get the details of the selected book
    $sql="SELECT * FROM book WHERE id=$book_id";
    
    //Execute the query
    $res=mysqli_query($conn, $sql);
    
    //Count the rows
    $count=mysqli_num_rows($res);
    
    //Check whether the data is available or not
    if($count==1)
    {
        //We have data
        //Get the data from database
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];
    }
    else
    {
        //Book not available
        //Redirect to home page
        header('location:'.SITEURL.'partials-front/index.php');
    }
}
else 
{
    //Redirect to home page
    header('location:'.SITEURL.'partials-front/index.php');
}
?>

<!-- Start of Book Order Section -->
<section class="book-search">
	<div class="container">
		<h2 class="text-center">Order Details</h2>
		<form action="" method="post"> 
		<fieldset>
		<legend>Selected Book</legend>
		<div class="book-menu-img">
		<?php 
		//Check whether the image is available or not
		if($image_name=="")
		{
		   //Image is not available
		   echo "<div class='error'>Image is not available</div>";
		}
		else
		{
		    //Image is available
		    ?>
		    <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" width="300" height="300">
		    <?php
		}
		?>
		</div>
		<br>
		<div class="book-menu-desc">
		<h3><?php echo $title; ?></h3>
		<input type="hidden" name="book" value="<?php echo $title; ?>">
		
		<p class="book-price">Rs.<?php echo $price; ?></p>
		<input type="hidden" name="price" value="<?php echo $price; ?>">
		
		<div class="order-label">Quantity</div>
		<input type="number" name="quantity" class="input-quantity" value="1" min="1" max="5" required>
		
		</div>
		</fieldset>
		
		<fieldset>
		<legend>Delivery Details</legend>
		
		<div class="order-label">Name</div>
		<input type="text" name="name" placeholder="e.g. Ram Dayal" class="input-responsive" required>
		
		<div class="order-label">Phone Number</div>
		<input type="tel" name="contact" placeholder="e.g. 9787xxxxxx" class="input-responsive" required>
		
		<div class="order-label">Email</div>
		<input type="email" name="email" placeholder="e.g. ram.dayal@abc.com" class="input-responsive" required>
		
		<div class="order-label">Address</div>
		<textarea name="address" rows="10" placeholder="e.g. Street, City, State, Country" class="input-responsive" required></textarea>
		
		<div>
		<input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
		</div>
		
		</fieldset>
		</form>
		
		<?php 
		
		//Check whether submit button is clicked
		if(isset($_POST['submit']))
		{
		    //Get all the details from the form
		    $book=$_POST['book'];
		    $price=$_POST['price'];
		    $quantity=$_POST['quantity'];
		    $total=$price*$quantity;
		    $order_date=date("Y-m-d h:i:s");
		    $status="Ordered";
		    $customer_name=mysqli_real_escape_string($conn, $_POST['name']);
		    $customer_contact=mysqli_real_escape_string($conn, $_POST['contact']);
		    $customer_email=mysqli_real_escape_string($conn, $_POST['email']);
		    $customer_address=mysqli_real_escape_string($conn, $_POST['address']);
		    
		    //Save the order in database
		    //Create SQL to save the data
		    $sql2="INSERT INTO order_book SET 
            book='$book',
            price=$price,
            quantity=$quantity,
            total=$total,
            order_date='$order_date',
            status='$status',
            customer_name='$customer_name',
            customer_contact='$customer_contact',
            customer_email='$customer_email',
            customer_address='$customer_address'
            ";
		    
		    //Execute the Query
		    $res2=mysqli_query($conn, $sql2);
		    
		    //Check whether query executed successfully
		    if($res2==true)
		    {
		        //Query executed and order saved
		        $_SESSION['order']="<div class='success text-center'>Book ordered successfully.</div>";
		        header('location:'.SITEURL.'partials-front/index.php');
		    }
		    else
		    {
		        //Failed to save order
		        $_SESSION['order']="<div class='error text-center'>Failed to order book.</div>";
		        header('location:'.SITEURL.'partials-front/index.php');
		    }
		}
		
		?>
	</div>
</section>
<!-- End of Book Order Section -->

<?php include('footer.php'); ?>