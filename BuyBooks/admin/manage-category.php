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
				<h1 class="text-center">Manage Category</h1>
				
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
				if(isset($_SESSION['delete'])) {
				    echo $_SESSION['delete']; //Displaying session
				    unset($_SESSION['delete']); //Removing session
				}
				if(isset($_SESSION['no-category-found']))
				{
				    echo $_SESSION['no-category-found'];
				    unset($_SESSION['no-category-found']);
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
				if(isset($_SESSION['failed-remove']))
				{
				    echo $_SESSION['failed-remove'];
				    unset($_SESSION['failed-remove']);
				}
				?>
				<br>
				
				<!-- Button to add category -->
				<a href="<?php echo SITEURL; ?>admin/add-category.php">
					<i class="fas fa-plus-circle"></i>Add New Category
				</a>
				<table>
					<tr>
						<th>Serial Number</th>
						<th>Title</th>
						<th>Image</th>
						<th>Featured</th>
						<th>Active</th>
						<th colspan="2">Actions</th>
					</tr>
				
					<?php
				
				    //Query to get all categories
				    $sql="SELECT * FROM category";
				    
				    //Execute query
				    $res=mysqli_query($conn, $sql);
				    
				    //Count rows
				    $count=mysqli_num_rows($res);
				    
				    //Create and initialize serial number
				    $sn=1;
				    
				    //Check if we have data in database
				    if($count>0)
				    {
				        //We have data in database
				        //Get the data and display
				        while($row=mysqli_fetch_assoc($res))
				        {
				            $id=$row['id'];
				            $title=$row['title'];
				            $image_name=$row['image_name'];
				            $featured=$row['featured'];
				            $active=$row['active'];
				        
				            ?>
				
							<tr>
        						<td><?php echo $sn++; ?></td>
        						<td><?php echo $title; ?></td>
        						<td>
        						<?php 
        						
        						//Check whether image name is available or not
        						if($image_name!="")
        						{
        						  //Display image
        						  ?>
        						  	<img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
        						  <?php 
        						}
        						else 
        						{
        						    //Display message
        						    echo "<div class='error'>Image not added</div>";
        						}
        						?>
        						
        						</td>
        						<td><?php echo $featured; ?></td>
        						<td><?php echo $active; ?></td>
        						<td>
        							<a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>">
        							<i class="fas fa-edit"></i>Edit
        							</a>
        						</td>
        						    <?php echo 
            							   "<td><a onclick='confirmationDelete(this);return false;'
            							   href='".SITEURL."admin/delete-category.php?id=".$id."&image_name=".$image_name."'>
                                                <i class='fas fa-trash'></i>Delete
            							   </a></td>";
                                    ?>
        					</tr>
        					
						<?php 
				        }
				    }
				    else 
				    {
				        //We don't have data
				        ?>
				        <tr>
				        	<td colspan="6"><div class="error">No category added.</div></td>
				        </tr>
					<?php 
				    }
				    ?>
					
					
					
				</table>
			</div>
		</div>
		
<?php include('partials/footer.php')?>	
