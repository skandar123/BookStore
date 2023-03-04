<?php include('partials/menu.php'); ?>

<div class="main-content">
			<div class="wrapper">
				<h1 class="text-center">Update Book</h1>
				
				<?php 
				
				//Check if id is set
				if(isset($_GET['id']))
				{
				    //Get id and all details
				    $id=$_GET['id'];
				    
				    //SQL query to update
				    $sql2="SELECT * FROM book WHERE id=$id";
				    
				    //Execute query
				    $res2=mysqli_query($conn, $sql2);
				    
				    //Get details
				    $row2=mysqli_fetch_assoc($res2);
				        
				    $title=$row2['title'];
				    $description=$row2['description'];
				    $price=$row2['price'];
				    $current_image=$row2['image_name'];
				    $current_category=$row2['category_id'];
				    $featured=$row2['featured'];
				    $active=$row2['active'];
				}
				else
				{
				    //Redirecting to Manage Category page
				    header("location:".SITEURL.'admin/manage-book.php');
				}
				?>
				<div class="special">
				<form action="" method="post" enctype="multipart/form-data">
					
							<label>Title</label>
							<input type="text" name="title" value="<?php echo $title; ?>">
						
							<label>Description</label>
							<textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
						
							<label>Price</label>
							<i class="fas fa-rupee-sign"></i>
							<input type="number" name="price" value="<?php echo $price; ?>">
						
						    <div>
							<label>Current Image</label>
							
							
						    <?php 
						    if($current_image=="")
						    {
						        //Image is not added
						        echo "<div class='error'>Image not added.</div>";
						    }
						    else 
						    {
						        //Image is added
						        ?>
						        <img src="<?php echo SITEURL; ?>images/book/<?php echo $current_image; ?>" width="150px">
						        <?php 
						    }
						    ?>
						    </div>
						    <br>
							<label>Select New Image</label>
							<input type="file" name="image">
						
							<label>Category</label>
								<select name="category">
								<?php 
								
								    //Get all active categories from database
								    $sql="SELECT * FROM category WHERE active='Yes'";
								    
								    //Executing query
								    $res=mysqli_query($conn, $sql);
								    
								    //Count rows to check if we have categories
								    $count=mysqli_num_rows($res);
								    
								    //If count greater than 0, then categories exist in database
								    if($count>0)
								    {
								        while($row=mysqli_fetch_assoc($res))
								        {
								            $category_title=$row['title'];
								            $category_id=$row['id'];
								            ?>
								            
								            <option <?php if($current_category==$category_id){ echo "selected";} ?>
								            value="<?php echo $category_id; ?>">
								            <?php echo $category_title; ?>
								            </option>
								            
								            <?php 
								        }
								    }
								    else 
								    {
								        //Category does not exist
								        ?>
								        <option value="0">No Category Found</option>
								        <?php 
								    }
								
								?>
								</select>
								<br/><br/>
							<div>
							<label>Featured</label>
								<input <?php if($featured=="Yes") { echo "checked"; }?> type="radio" name="featured" value="Yes">Yes
								<input <?php if($featured=="No") { echo "checked"; }?> type="radio" name="featured" value="No">No
							</div>
							<br/>
							<div>
							<label>Active</label>
								<input <?php if($active=="Yes") { echo "checked"; }?> type="radio" name="active" value="Yes">Yes
								<input <?php if($active=="No") { echo "checked"; }?> type="radio" name="active" value="No">No
						    </div>
						    <br/>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
								<input type="submit" name="submit" value="Update Book" class="btn-new">
				</form>
				</div>
            <?php 
            //Check whether the submit button is clicked
            if(isset($_POST['submit']))
            {
                //Get data from form
                $id=$_POST['id'];
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $current_image=$_POST['current_image'];
                $category=$_POST['category'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];
                
                //Updating new image if selected
                //Check if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    $image_name=$_FILES['image']['name'];
                    
                    //Check if file is available
                    if($image_name!="")
                    {
                        //Image is available
                        $ext=explode('.', $image_name); //Get the extension of the image
                        $image_name=$ext[0].rand(0000,9999).'.'.$ext[1]; //Renamed image
                        
                        //Upload image
                        $source_path=$_FILES['image']['tmp_name']; //Source
                        $destination_path="../images/book/".$image_name; //Destination
                        //Upload the image
                        $upload=move_uploaded_file($source_path, $destination_path);
                        
                        //Check if the image is uploaded
                        if($upload==false)
                        {
                           //Set message
                           $_SESSION['upload']="<div class='error'>Failed to upload new image.</div>";
                           //Redirecting to add category page
                           header('location:'.SITEURL.'admin/manage-book.php');
                           //Stop the process
                           die();
                        }
                        //Remove current image
                        if($current_image!="")
                        {
                            $remove_path="../images/book/".$current_image;
                            $remove=unlink($remove_path);
                        
                            //Check if the image is removed
                            if($remove==false)
                            {
                                //Failed to remove image
                                $_SESSION['remove-failed']="<div class='error'>Failed to remove current image.</div>";
                                //Redirecting to Manage Book page
                                header('location:'.SITEURL.'admin/manage-book.php');
                                //Stop the process
                                die();
                            }
                        }
                     }
                     else
                     {
                         $image_name=$current_image;
                     }
                }
                else
                {
                     $image_name=$current_image;
                }
                
                //SQL query to save data to database
                $sql3="UPDATE book SET
                title='$title',
                description='$description',
                price=$price,
                image_name='$image_name',
                category_id=$category,
                featured='$featured',
                active='$active'
                WHERE id=$id";
                
                //Execute query
                $res3=mysqli_query($conn, $sql3);
                
                //Check if query execution was successful
                if($res3==true){
                    //Data inserted
                    $_SESSION['update']="<div class='success'>Book updated.</div>";
                    //Redirecting to Manage Book page
                    header('location:'.SITEURL.'admin/manage-book.php');
                }else{
                    //Insertion Failed
                    $_SESSION['update']="<div class='error'>Failed to update book.</div>";
                    //Redirecting to Add Book page
                    header('location:'.SITEURL.'admin/manage-book.php');
                }
            }
            ?>
				
	</div>
</div>

<?php include('partials/footer.php')?>	
