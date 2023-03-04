<?php include('partials/menu.php')?>
		
		<div class="main-content">
			<div class="wrapper">
				<h1 class="text-center">Manage Order</h1>
				
				<?php 
				if(isset($_SESSION['update']))
				{
				    echo $_SESSION['update'];
				    unset($_SESSION['update']);
				}
				?>
				
				
				<table>
					<tr>
						<th>S.N.</th>
						<th>Book</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
						<th>Date</th>
						<th>Status</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Address</th>
						<th>Actions</th>
					</tr>
				    <?php 
				    //Get all the orders from database
				    $sql="SELECT * FROM order_book ORDER BY id DESC"; //Display the latest order at first
				    //Execute Query
				    $res=mysqli_query($conn, $sql);
				    //Count the rows
				    $count=mysqli_num_rows($res);
				    $sn=1; //Create a serial number and set its initial value as 1
				    if($count>0){
				        //Order is available
				        while($row=mysqli_fetch_assoc($res))
				        {
				            //Get all the order details
				            $id=$row['id'];
				            $book=$row['book'];
				            $price=$row['price'];
				            $qty=$row['quantity'];
				            $total=$row['total'];
				            $order_date=$row['order_date'];
				            $status=$row['status'];
				            $customer_name=$row['customer_name'];
				            $customer_contact=$row['customer_contact'];
				            $customer_email=$row['customer_email'];
				            $customer_address=$row['customer_address'];
				            ?>
				            <tr>
							<td><?php echo $sn++; ?>.</td>
							<td><?php echo $book; ?></td>
							<td><i class="fas fa-rupee-sign"></i><?php echo $price; ?></td>
							<td><?php echo $qty; ?></td>
							<td><i class="fas fa-rupee-sign"></i><?php echo $total; ?></td>
							<td><?php echo $order_date; ?></td>
							
							<td>
							<?php 
							//Ordered, On Delivery, Delivered, Cancelled
							if($status=="Ordered")
							{
							 echo "<label>$status</label>"; 
							}
							elseif($status=="On Delivery")
							{
							    echo "<label style='color: orange;'>$status</label>";
							}
							if($status=="Delivered")
							{
							    echo "<label style='color: green;'>$status</label>";
							}
							elseif($status=="Cancelled")
							{
							    echo "<label style='color: red;'>$status</label>";
							}
							?>
							</td>
							
							<td><?php echo $customer_name; ?></td>
							<td><?php echo $customer_contact; ?></td>
							<td><?php echo $customer_email; ?></td>
							<td><?php echo $customer_address; ?></td>
							<td>
								
								<a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id ?>">
								<i class="fas fa-edit"></i>Edit
								</a>
								
							</td>
							</tr>
				            <?php
				        }
				    }
				    else 
				    {
				        //Order is not available
				        echo "<tr><td colspan='12' class='error'>Orders are not available</td></tr>";
				    }
				    ?>
					
					 
					
				</table>
			</div>
		</div>
		
<?php include('partials/footer.php')?>	
