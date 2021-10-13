<?php
	session_start();
		if (!isset($_SESSION["userid"])) {
			header("location: loginform_admin.php");
			 }
       elseif ($_SESSION["type"]==0) {
         header("location: loginform_admin.php");
       }




include ('retrieveusers.php'); 
$db_handle = retrieveCategories();

?>


<!DOCTYPE html>
<html>

<!--HTML HEADER-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Categories page </title>
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
				
				<li><a href="categories_admin.php" class="active"> <span class="fas fa-clipboard-list"> </span> <span> Categories</span> </a></li>
				<li><a href="feeds_admin.php"><span class="far fa-newspaper"> </span><span>Feeds</span> </a></li>
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
			<span class="fas fa-search">  </span>
			<form action="searchFeeds.php" method="GET">
			<input type="text" name="query" placeholder="Search here">
			<input type="submit" name="submit"></input></form>
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
		<button id="modalBtn" class="modal-btn">Add Category</button>
		<!--Add Product
		<script src="../js/modal.js"></script>-->
				  
		<div id="simpleModal"class="modal">
			<div class="modal-content">
				<div class="modal-header">	
					<span class="closeBtn">&times;</span>
					<h2>Add Category</h2>
				</div>
				
				<div class="modal-body">	
				<form action="addcategories.php" method="POST">

					<label for="categoryname">Category Name:</label><br>
					<input type="text" name="categoryName"><br>
					<button class="btn-submit" name="submit" type="submit">Submit</button>	
				</form>
				</div>
			</div>
		</div>



		<!--End Of an Add -->
	
	<table>
	<thead>
	<tr>
		<th> Category Id </th>
		<th>Category Name </th>
		<th> Action </th>
		
	</tr>
	</thead>
	<tbody>
	<?php
	  foreach($db_handle as $user )
	  {?>
	<tr>
		<td> <?php echo $user['categoryID'];?> </td>
		<td> <?php echo $user['categoryName'];?> </td>
		

		<td> 
			
			<!--<a href="#updateModal=<?php //echo $user['categoryID'];?>"><button id="modalBtn2" class="btn-success"> EDIT</button></a>-->
			<button class="btn-success" onclick="document.getElementById('updateModal=<?php echo $user['categoryID'];?>').style.display='block'">EDIT</button>
			
			<a href="?deletecat=<?php echo $user['categoryID'];?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete The <?php echo $user['categoryName'];?> Category?')">DELETE</a>
		</td>
	</tr>

	<!--DELETING ITEM -->

		
		<div id="updateModal=<?php echo $user['categoryID'];?>" class="updatemodal">
			<div class="modal-content">
				<div class="modal-header">	
					  <span onclick="document.getElementById('updateModal=<?php echo $user['categoryID'];?>').style.display='none'"
						class="closeupdateBtn" title="Close Modal">&times;</span>
					<h2>Update Category</h2>
				</div>
				
				<div class="modal-body">	
				<form action="updateCategory.php?myid=<?php echo $user['categoryID'];?>" method="POST">

					<label for="categoryname">Category Name:</label><br>
					<input type="text"  name = "categoryname"value="<?php echo $user['categoryName'];?>" ><br>
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
		  $deleteQuery="DELETE FROM categories WHERE categoryID='$theId'";
		  $deleteResults = mysqli_query($connection,$deleteQuery);
		  if ($deleteResults){
			  echo "
			  <script>
			  alert ('Delete was Succesful');
			  window.location.href=('categories_admin.php');
			  </script>
			  ";
		  }
		  else{
			  echo "
			  <script>
			  alert ('Delete was Unsuccesful');
			  window.location.href=('categories_admin.php');
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
