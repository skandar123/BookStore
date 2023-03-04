<?php include('partials/menu.php');?>
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
				<h1 class="text-center">Manage Admin</h1>
				
				<?php 
				if(isset($_SESSION['add'])) {
				    echo $_SESSION['add']; //Displaying session
				    unset($_SESSION['add']); //Removing session
				}
				if(isset($_SESSION['delete'])) {
				    echo $_SESSION['delete']; //Displaying session
				    unset($_SESSION['delete']); //Removing session
				}
				if(isset($_SESSION['update'])) {
				    echo $_SESSION['update']; //Displaying session
				    unset($_SESSION['update']); //Removing session
				}
				if(isset($_SESSION['user-not-found'])) {
				    echo $_SESSION['user-not-found']; //Displaying session
				    unset($_SESSION['user-not-found']); //Removing session
				}
				if(isset($_SESSION['pwd-not-match'])) {
				    echo $_SESSION['pwd-not-match']; //Displaying session
				    unset($_SESSION['pwd-not-match']); //Removing session
				}
				if(isset($_SESSION['change-pwd'])) {
				    echo $_SESSION['change-pwd']; //Displaying session
				    unset($_SESSION['change-pwd']); //Removing session
				}
				?>
				<br />
				<!-- Button to add admin -->
				<a href="<?php echo SITEURL; ?>admin/add-admin.php">
					<i class="fas fa-plus-circle"></i>Add New Admin
				</a>
				<table>
					<tr>
						<th>Serial Number</th>
						<th>Name</th>
						<th>Username</th>
						<th colspan="3">Actions</th>
					</tr>
					
					<?php 
					   //Query to get all admin data
					   $sql="SELECT * FROM admin";
					   //Execute query
					   $res=mysqli_query($conn, $sql);
					   
					   //check if the query was executed
					   if($res==TRUE){
					       $count=mysqli_num_rows($res);
					       $sn=1;
					       if($count>0){
					           //Data is present in database
					           while($rows=mysqli_fetch_assoc($res)){
					               //To get the each row from database
					               $id=$rows['id'];
					               $name=$rows['name'];
					               $username=$rows['username'];
					               
					               //Displaying the values in table
					?>
					               
					               <tr>
            						<td><?php echo $sn++; ?></td>
            						<td><?php echo $name; ?></td>
            						<td><?php echo $username; ?></td>
            						<td>
            							<a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>">
            								<i class="fas fa-user-lock"></i>Change Password
            							</a>
            						</td>
            						<td>
            							<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>">
            							<i class="fas fa-edit"></i>Edit
            							</a>
            						</td>
            							<?php echo 
            							   "<td><a onclick='confirmationDelete(this);return false;'
            							   href='".SITEURL."admin/delete-admin.php?id=".$id."'>
                                           <i class='fas fa-trash'></i>Delete
            							   </a></td>";
                                        ?>
            					   </tr>
					               
					<?php 
					           }
					       }else{
					           //No data in database
					       }
					   }
					?>
				</table>
			 </div>
		</div> 
		
<?php include('partials/footer.php')?>	
