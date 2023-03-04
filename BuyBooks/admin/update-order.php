<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1 class="text-center">Update Order</h1>
		<?php 
		//Check whether id is set or not
		if(isset($_GET['id']))
		{
		   //get the order details
		   $id=$_GET['id'];
		   
		   //get all other details based on this id
		   //SQL Query to get the order details
		   $sql="SELECT * FROM order_book WHERE id=$id";
		   
		   //Execute Query
		   $res=mysqli_query($conn, $sql);
		   
		   //Count Rows
		   $count=mysqli_num_rows($res);
		   
		   if($count==1)
		   {
		       //Detail Available
		       $row=mysqli_fetch_assoc($res);
		       
		       $book=$row['book'];
		       $price=$row['price'];
		       $qty=$row['quantity'];
		       $status=$row['status'];
		       $customer_name=$row['customer_name'];
		       $customer_contact=$row['customer_contact'];
		       $customer_email=$row['customer_email'];
		       $customer_address=$row['customer_address'];
		   }
		   else 
		   {
		       //Detail is not available
		       //Redirect to manage order
		       header('location:'.SITEURL.'admin/manage-order.php');
		   }
		}
		else 
		{
		    //redirect to manage order page
		    header('location:'.SITEURL.'admin/manage-order.php');
		}
		?>
		<div class="special">
		<form action="" method="post">
		
		<label>Book Name</label><br/>
		<b><?php echo $book; ?></b>
		<br/><br/>
		
		<label>Price</label><br/>
		<b> <i class="fas fa-rupee-sign"></i> <?php echo $price; ?></b>
		<br/><br/>
		
		<label>Quantity</label>
		<input type="number" name="qty" value="<?php echo $qty; ?>">
		
		<label>Status</label>
		<select name="status">
		<option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
		<option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
		<option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
		<option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
		</select>
		
		<label>Customer Name:</label>
		<input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
		
		<label>Customer Contact:</label>
		<input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
		
		<label>Customer Email:</label>
		<input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
		
		<label>Customer Address:</label>
		<textarea type="text" name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="price" value="<?php echo $price; ?>">
		<input type="submit" name="submit" value="Update Order" class="btn-new">
		
		</form>
		</div>
		<?php 
		//Check whether update button is clicked
		if(isset($_POST['submit']))
		{
		    //echo "Clicked";
		    //Get all the values from form
		    $id=$_POST['id'];
		    $price=$_POST['price'];
		    $qty=$_POST['qty'];
		    
		    $total=$price * $qty;
		    
		    $status=$_POST['status'];
		    
		    $customer_name=$_POST['customer_name'];
		    $customer_contact=$_POST['customer_contact'];
		    $customer_email=$_POST['customer_email'];
		    $customer_address=$_POST['customer_address'];
		    
		    //Update the values
		    $sql2="UPDATE order_book SET
            quantity=$qty,
            total=$total,
            status='$status',
            customer_name='$customer_name',
            customer_contact='$customer_contact',
            customer_email='$customer_email',
            customer_address='$customer_address'
            WHERE id=$id
            ";
		    
		    //Execute the query
		    $res2=mysqli_query($conn, $sql2);
		    
		    //Check whether updated and redirect to manage order with message
		    if($res2==true)
		    {
		        //Updated
		        $_SESSION['update']="<div class='success'>Order updated successfully.</div>";
		        header('location:'.SITEURL.'admin/manage-order.php');
		    }
		    else 
		    {
		        //Failed to update
		        $_SESSION['update']="<div class='error'>Failed to update order.</div>";
		        header('location:'.SITEURL.'admin/manage-order.php');
		    }
		}
		?>
		
	</div>
</div>

<?php include('partials/footer.php'); ?>
