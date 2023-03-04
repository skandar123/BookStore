<?php include('partials/menu.php'); ?>

<div class="main-content">
			<div class="wrapper">
				<h1 class="text-center">Update Category</h1>
				<?php 
				
				//Check if id is set
				if(isset($_GET['id']))
				{
				    //Get id and all details
				    $id=$_GET['id'];
				    
				    //SQL query to update
				    $sql="SELECT * FROM category WHERE id=$id";
				    
				    //Execute query
				    $res=mysqli_query($conn, $sql);
				    
				    //Count rows to check if the data is available
				    $count=mysqli_num_rows($res);
				    
				    //Check if we have data
				    if($count==1){
				        //Get details
				        $row=mysqli_fetch_assoc($res);
				        
				        $title=$row['title'];
				        $current_image=$row['image_name'];
				        $featured=$row['featured'];
				        $active=$row['active'];
				    }else{
				        $_SESSION['no-category-found']="<div class='error'>Category not found.</div>";
				        //Redirecting to Manage Category page
				        header("location:".SITEURL.'admin/manage-category.php');
				    }
				}
				else
				{
				    //Redirecting to Manage Category page
				    header("location:".SITEURL.'admin/manage-category.php');
				}
				?>
				<div class="special">
				<form action="" method="post" enctype="multipart/form-data">
					
							<label>Title</label>
							<input type="text" name="title" value="<?php echo $title; ?>">
						
							<label>Current Image</label>
						    <?php 
						    if($current_image!="")
						    {
						        //Display image
						        ?>
						        <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
						        <?php 
						    }
						    else 
						    {
						        //Display message
						        echo "<div class='error'>Image not added.</div>";
						    }
						    ?>
						    <br/><br/>
							<label>New Image</label>
							<input type="file" name="image">
						    <br/>
						    <div>
						    <br/>
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
								<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<input type="submit" name="submit" value="Update Category" class="btn-new">
							
				</form>
				</div>
			</div>
</div>

<?php 
    //Check whether the submit button is clicked
if(isset($_POST['submit'])){
    
    //Get data from form
    $id=$_POST['id'];
    $title=$_POST['title'];
    $current_image=$_POST['current_image'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    
    //Updating new image if selected
    //Check if the image is selected
    if(isset($_FILES['image']['name']))
    {
        $image_name=$_FILES['image']['name'];
        if($image_name!="")
        {
            //Upload image
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/category/".$image_name;
            $upload=move_uploaded_file($source_path, $destination_path);
            
            //Check if the image is uploaded
            if($upload==false)
            {
               //Set message
               $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
               //Redirecting to add category page
               header('location:'.SITEURL.'admin/manage-category.php');
               //Stop the process
               die();
            }
            //Remove current image
            if($current_image!="")
            {
                $remove_path="../images/category/".$current_image;
                $remove=unlink($remove_path);
            
                //Check if the image is removed
                if($remove==false)
                {
                    //Failed to remove image
                    $_SESSION['failed-remove']="<div class='error'>Failed to remove current image.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
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
    $sql2="UPDATE category SET
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'
    WHERE id='$id'
";
    
    //Execute query
    $res2=mysqli_query($conn, $sql2);
    
    //Check if query execution was successful
    if($res2==true){
        //Data inserted
        $_SESSION['update']="<div class='success'>Catogory updated.</div>";
        //Redirecting to Manage Category page
        header("location:".SITEURL.'admin/manage-category.php');
    }else{
        //Insertion Failed
        $_SESSION['update']="<div class='error'>Failed to update category.</div>";
        //Redirecting to Add Category page
        header("location:".SITEURL.'admin/manage-category.php');
    }
}
?>

<?php include('partials/footer.php')?>	
