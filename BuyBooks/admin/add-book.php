<?php include('partials/menu.php'); ?>

<div class="main-content">
			<div class="wrapper">
				<h1 class="text-center">Add Book</h1>
				
				<?php 
				if(isset($_SESSION['upload']))
				{
				    echo $_SESSION['upload'];
				    unset($_SESSION['upload']);
				}
				?>
				<div class="special">
				<form action="" method="post" enctype="multipart/form-data">
				
							<label>Title</label>
							<input type="text" name="title" placeholder="Enter Book Title">
						
							<label>Description</label>
							<textarea name="description" cols="30" rows="5" placeholder="More about the book"></textarea>
						
							<label>Price</label>
							<i class="fas fa-rupee-sign"></i>
							<input type="number" name="price" placeholder="Enter book price">
						
							<label>Select Image</label>
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
								            $id=$row['id'];
								            $title=$row['title'];
								            ?>
								            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
								<input type="radio" name="featured" value="Yes">Yes
								<input type="radio" name="featured" value="No">No	
						    </div>
						    <br/>
							<div>
							<label>Active</label>
								<input type="radio" name="active" value="Yes">Yes
								<input type="radio" name="active" value="No">No
							</div>
							<br/>
							<input type="submit" name="submit" value="Add Book" class="btn-new">
					
				</form>
				</div>
				<?php 
//Process value from form and save in the database
//Check whether submit button is clicked or not
if(isset($_POST['submit'])){
    
    //Get data from form
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    
    //Check if radio button for featured and active are checked
    if(isset($_POST['featured']))
    {
        $featured=$_POST['featured'];
    }
    else 
    {
        $featured="No";
    }
    
    if(isset($_POST['active']))
    {
        $active=$_POST['active'];
    }
    else
    {
        $active="No";
    }
    
    //Upload the image if selected
    if(isset($_FILES['image']['name']))
    {
        //Get details of the selected image
        $image_name=$_FILES['image']['name'];
        
        //Check if the image is selected
        if($image_name!="")
        {
            $ext=explode('.', $image_name); //Get the extension of the image
            $image_name=$ext[0].rand(0000,9999).'.'.$ext[1]; //Renamed image
            
            //current image location
            $src=$_FILES['image']['tmp_name'];
            //location to upload the file
            $dst="../images/book/".$image_name;
            $upload=move_uploaded_file($src, $dst);
            if($upload==false)
            {
                //Failed to upload image
                $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                header('location:'.SITERURL.'admin/add-book.php');
                //Stop the process
                die();
            }
        }
    }
    else
    {
        $image_name="";
    }
    
    //SQL query to save data to database
    $sql2="INSERT INTO book SET
    title='$title',
    description='$description',
    price=$price,
    image_name='$image_name',
    category_id=$category,
    featured='$featured',
    active='$active'
";
    
    //Execute query
    $res2=mysqli_query($conn, $sql2);
    
    //Check if query execution was successful
    if($res2==true){
        //Data inserted
        $_SESSION['add']="<div class='success'>Book added</div>";
        //Redirecting to Manage Food page
        header("location:".SITEURL.'admin/manage-book.php');
    }else{
        //Insertion Failed
        $_SESSION['add']="<div class='error'>Failed to add book</div>";
        //Redirecting to Manage Food page
        header("location:".SITEURL.'admin/manage-book.php');
    }
}
?>
			</div>
</div>


<?php include('partials/footer.php')?>	


