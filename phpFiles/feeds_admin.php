
<?php
	session_start();
		if (!isset($_SESSION["userid"])) {
			header("location: loginform_admin.php");
			 }
       elseif ($_SESSION["type"]!=1) {
         header("location: loginform_admin.php");
       }



include ('retrieveusers.php'); 
$db_handle = retrieveFeeds();
$cat_handle = retrieveCategories();
?>
<!DOCTYPE html>
<html>

<!--HTML HEADER-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Feeds page </title>
	<link rel="stylesheet"  href="../css/adminpanel.css">
	<link rel="stylesheet"  href="../css/categorytable.css">
	<script src="https://kit.fontawesome.com/c5ff6ca8e5.js" crossorigin="anonymous"></script><!--Font awesome code-->
</head>
<body>
	<input type="checkbox" id="nav-toggle">

	<div class="sidebar">
		

		<div class="sidebar-menu">
			<ul>
				<div class="sidebar-brand">
					<h2> <span><img class="img" src="../images/logo.png" width=100px height="50px">Taarifa Site</span> </h2>
				</div>
				<li ><a  href="adminpanel.php" > <span class="fas fa-home"> </span> <span> Home</span> </a></li>
				
				<li><a href="categories_admin.php" > <span class="fas fa-clipboard-list"> </span> <span> Categories</span> </a></li>
				<li><a href="feeds_admin.php" class="active"><span class="far fa-newspaper"> </span><span>Feeds</span> </a></li>
				<li><a href="usersuggestions.php" ><span class="far fa-newspaper"> </span><span>Suggestions</span> </a></li>
				<li><a href="users_admin.php"><span class="fas fa-users"> </span><span> Users </span> </a></li>
				<li><a href="admins.php"> <span class="fas fa-user-tie"> </span><span> Administrators </span></a></li>
			</ul>	
		</div>	
			
	</div>

	<div class="main-content">
		<header>

			<h1>
				
				<label for="nav-toggle"><span class="fas fa-bars"> </span></label> Dashboard
			
			</h1>
		
		<div class="search-wrapper">
			<span class="fas fa-search"></span>
			<input type="search" placeholder="Search here"> 
		</div>

		<div class="user-wrapper">
				<div><a href="../includes/logout_admin.php">  Logout </a>
			<span class="far fa-user-circle"></span>
			 Administrator <?php echo $_SESSION["user"]; ?></div>

		</div>
		</header>
	</div>



<!--PHP Table-->
<div class="table">
		<button id="modalBtn" class="modal-btn">Add feed</button>
		<!--Add Product
		<script src="../js/modal.js"></script>-->
				  
		<div id="simpleModal"class="modal">
			<div class="modal-content">
				<div class="modal-header">	
					<span class="closeBtn">&times;</span>
					<h2>Add feed</h2>
				</div>
				
				<div class="modal-body">	
				<form action="addFeeds.php" method="POST">

					<label for="feedname">Feed Name:</label><br>
					<input type="text" name="feedname"><br>
					<label for="feedname">Feed Link:</label><br>
					<input type="text" name="feedlink" style="width:60%";><br>
						<label for="categoryname">Category Name:</label><br>
				
	 <select name="catID">
	  	<?php
	  foreach($cat_handle as $cat )
	  {?>		

			
						<option  value="<?php echo $cat['categoryID'];?>" ><?php echo $cat['categoryID'];?>. <?php echo $cat['categoryName'];?> </option>
					  <?php } ?>
					</select><br>



					
					<button class="btn-submit" name="submit" type="submit">Submit</button>	
				</form>

				</div>
			</div>
		</div>
		


		<!--End Of an Add -->
	
	<table>
	<thead>
	<tr>
		<th> Feed Id </th>
		<th>Feed Name </th>
		<th>Feed Link </th>
		<th> Action </th>
		
	</tr>
	</thead>
	<tbody>
	<?php
	  foreach($db_handle as $user)
	  {?>
	<tr>
		<td> <?php echo $user['feedID'];?> </td>
		<td> <?php echo $user['feedName'];?> </td>
		<td> <?php echo $user['feedLink'];?> </td>
		<td> 
			
			<!--<a href="#updateModal=<?php //echo $user['feedID'];?>"><button id="modalBtn2" class="btn-success"> EDIT</button></a>-->
			<button class="btn-success" onclick="document.getElementById('updateModal=<?php echo $user['feedID'];?>').style.display='block'">EDIT</button>
			
			<a href="?deletecat=<?php echo $user['feedID'];?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete The <?php echo $user['feedName'];?> feed?')">DELETE</a>
		</td>
	</tr>

	<!--DELETING ITEM -->

		
		<div id="updateModal=<?php echo $user['feedID'];?>" class="updatemodal">
			<div class="modal-content">
				<div class="modal-header">	
					  <span onclick="document.getElementById('updateModal=<?php echo $user['feedID'];?>').style.display='none'"
						class="closeupdateBtn" title="Close Modal">&times;</span>
					<h2>Update Feed</h2>
				</div>
				
				<div class="modal-body">	
				<form action="updateFeeds.php?myid=<?php echo $user['feedID'];?>" method="POST">

					<label for="feedname">Feed Name:</label><br>
					<input type="text" name="feedname"  value="<?php echo $user['feedName'];?>" ><br>
					<label for="feedname">Feed Link:</label><br>
					<input id="name" type="text" name="feedlink" value="<?php echo $user['feedLink'];?>" style="width:60%"; ><br>
					<label for="feedname">Category ID:</label><br>
				    <select name="catID">
					  	<?php
					  foreach($cat_handle as $cat )
					  {?>		
						<option  value="<?php echo $cat['categoryID'];?>" ><?php echo $cat['categoryID'];?>. <?php echo $cat['categoryName'];?> </option>
					  <?php } ?>
					</select><br>
					<button class="btn-submit" name="submit" type="submit">Update</button>	
				</form>
				</div>
			</div>
			
		</div>

		  <!-- Modal -->

		
				  


	<!--DELETING AN ITEM -->
	<?php
	  if(isset ($_GET['deletecat']))
	  {
		  
		  $theId=$_GET['deletecat'];
		  $deleteQuery="DELETE FROM feed WHERE feedID='$theId'";
		  $deleteResults = mysqli_query($connection,$deleteQuery);
		  if ($deleteResults){
			  echo "
			  <script>
			  alert ('Delete was Succesful');
			  window.location.href=('feeds_admin.php');
			  </script>
			  ";
		  }
		  else{
			  echo "
			  <script>
			  alert ('Delete was Unsuccesful');
			  window.location.href=('feeds_admin.php');
			  </script>
			  ";
		  }
	  }
	}

?>


	</tbody>
	</table>
	

</div>
<script src="../js/modal.js"></script>
</body>
</html>
<script type="text/javascript">
			$(document).ready(function() {
    $('#name').keyup(function() {
        $(this).attr('size', $(this).val().length)
    });
});
		</script>
