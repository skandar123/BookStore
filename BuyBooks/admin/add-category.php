<?php include('partials/menu.php'); ?>

<div class="main-content">
			<div class="wrapper">
				<h1 class="text-center">Add Category</h1>
				<?php 
				if(isset($_SESSION['add']))
				{  
				    echo $_SESSION['add'];
				    unset($_SESSION['add']);
				}
				if(isset($_SESSION['upload']))
				{
				    echo $_SESSION['upload'];
				    unset($_SESSION['upload']);
				}
				?>
				<div class="special">
				<form action="" method="post" enctype="multipart/form-data">
					
							<label>Title</label>
							<input type="text" name="title" placeholder="Category Title">
						
							<label>Select Image</label>
							<input type="file" name="image">
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
								<input type="submit" name="submit" value="Add Category" class="btn-new">
							
				</form>
				</div>
			</div>
</div>


<?php include('partials/footer.php')?>	

<?php 
//Process value from form and save in the database
//Check whether submit button is clicked or not
if(isset($_POST['submit'])){
    
    //Get data from form
    $title=$_POST['title'];
    
    //Checking whether the button is selected or not
    if(isset($_POST['featured'])){
        $featured=$_POST['featured'];
    }
    else{
        //Setting the default value
        $featured="No";
    }
    
    if(isset($_POST['active'])){
        $active=$_POST['active'];
    }
    else{
        //Setting the default value
        $active="No";
    }
    
    if(isset($_FILES['image']['name']))
    {
        $image_name=$_FILES['image']['name'];
        if($image_name!="")
        {
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/category/".$image_name;
        
            //upload the image
            $upload=move_uploaded_file($source_path, $destination_path);
        
            //Check if the image was uploaded
            if($upload==false)
            {
                //Set message
                $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                //edirecting to Add Category page
                header('location:'.SITEURL.'admin/add-category.php');
                //Stop the process
                die();
            }
        }
    }
    else
    {
        //Image won't be uploaded
        $image_name="";
    }
    
    //SQL query to save data to database
    $sql="INSERT INTO category SET
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'
";
    
    //Execute query
    $res=mysqli_query($conn, $sql);
    
    //Check if query execution was successful
    if($res==true){
        //Data inserted
        $_SESSION['add']="<div class='success'>Category added.</div>";
        //Redirecting to Manage Admin page
        header("location:".SITEURL.'admin/manage-category.php');
    }else{
        //Insertion Failed
        $_SESSION['add']="<div class='error'>Failed to add category.</div>";
        //Redirecting to Add Admin page
        header("location:".SITEURL.'admin/add-category.php');
    }
}
?>
