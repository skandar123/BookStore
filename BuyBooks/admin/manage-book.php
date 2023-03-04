<?php include('partials/menu.php')?>
	<script>
    function confirmationDelete(anchor) {
    	var conf = confirm('Are you sure you want to delete this record?');
    	if (conf) 
    		window.location=anchor.attr("href");
    }
    </script>		
		<!-- Content -->
		<div class="main-content">
			<div class="wrapper">
				<h1 class="text-center">Manage Book</h1>
				<br />
				<a href="<?php echo SITEURL; ?>admin/add-book.php">
					<i class="fas fa-plus-circle"></i>Add New Book
				</a>
				<?php 
				if(isset($_SESSION['add']))
				{
				    echo $_SESSION['add'];
				    unset($_SESSION['add']);
				}
				if(isset($_SESSION['remove']))
				{
				    echo $_SESSION['remove'];
				    unset($_SESSION['remove']);
				}
				if(isset($_SESSION['delete']))
				{
				    echo $_SESSION['delete'];
				    unset($_SESSION['delete']);
				}
				if(isset($_SESSION['unauthorized']))
				{
				    echo $_SESSION['unauthorized'];
				    unset($_SESSION['unauthorized']);
				}
				if(isset($_SESSION['update']))
				{
				    echo $_SESSION['update'];
				    unset($_SESSION['update']);
				}
				if(isset($_SESSION['upload']))
				{
				    echo $_SESSION['upload'];
				    unset($_SESSION['upload']);
				}
				if(isset($_SESSION['remove-failed']))
				{
				    echo $_SESSION['remove-failed'];
				    unset($_SESSION['remove-failed']);
				}
				?>
				<table>
					<tr>
						<th>Serial Number</th>
						<th>Title</th>
						<th>Price</th>
						<th>Image</th>
						<th>Featured</th>
						<th>Active</th>
						<th colspan="2">Actions</th>
					</tr>
					
					<?php 
					   //Get all book
					   $sql="SELECT * FROM book";
					   
					   //Execute the query
					   $res=mysqli_query($conn, $sql);
					   
					   //count rows to check if data present
					   $count=mysqli_num_rows($res);
					   
					   $sn=1;
					   
					   if($count>0)
					   {
					      //Foods present
					      while($row=mysqli_fetch_assoc($res))
					      {
					       $id=$row['id'];
					       $title=$row['title'];
					       $price=$row['price'];
					       $image_name=$row['image_name'];
					       $featured=$row['featured'];
					       $active=$row['active'];
					      
					      ?>
					      <tr>
    						<td><?php echo $sn++; ?>. </td>
    						<td><?php echo $title; ?></td>
    						<td><i class="fas fa-rupee-sign"></i><?php echo $price; ?></td>
    						<td>
    							<?php 
    							if($image_name=="")
    							{
    							    //Image not added
    							    echo "<div class='error'>Image not added.</div>";
    							}
    							else 
    							{
    							    //Image selected, display image
    							    ?>
    							    <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" width="100px">
    							    <?php 
    							}
    							?>
    						</td>
    						<td><?php echo $featured; ?></td>
    						<td><?php echo $active; ?></td>
    						<td>
    							<a href="<?php echo SITEURL; ?>admin/update-book.php?id=<?php echo $id?>">
    								<i class="fas fa-edit"></i>Edit
    							</a>
    						</td>
    						    <?php echo 
            							   "<td><a onclick='confirmationDelete(this);return false;'
            							   href='".SITEURL."admin/delete-book.php?id=".$id."&image_name=".$image_name."'>
                                           <i class='fas fa-trash'></i>Delete
            							   </a></td>";
                                ?>
    					</tr>
    					<?php
					      }
					   }
					   else 
					   {
					       echo "<tr><td colspan='7' class='error'>Book not added yet.</td></tr>";
					   }
					?>
				
					
				</table>
			</div>
		</div>
		
<?php include('partials/footer.php')?>	
