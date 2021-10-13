
<?php
	session_start();
		if (!isset($_SESSION["userid"])) {
			header("location: loginform_admin.php");
			 }
       elseif ($_SESSION["type"]==0) {
         header("location: loginform_admin.php");
       }



include ('retrieveSuggestionsAdmin.php'); 
$db_handle = retrieveFeedsSuggestions();
$cat_handle = retrieveCategoriesSuggestions();
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
				<li><a href="feeds_admin.php" ><span class="far fa-newspaper"> </span><span>Feeds</span> </a></li>
				<li><a href="usersuggestions.php" class="active"><span class="far fa-newspaper"> </span><span>Suggestions</span> </a></li>
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
		
		<!--<div class="search-wrapper">
			<span class="fas fa-search"> </span>
			<input type="search" placeholder="Search here">
		</div>-->

		<div class="user-wrapper">
				<div><a href="../includes/logout_admin.php">  Logout </a>
			<span class="far fa-user-circle"></span>
			 Administrator <?php echo $_SESSION["user"]; ?></div>

		</div>
		</header>
	</div>



<!--PHP Table-->
<div class="table">
	
		<!--Add Product
		<script src="../js/modal.js"></script>-->
				  
	
		<!--End Of an Add -->
		<?php
	if ($db_handle == 0 && $cat_handle==0  ) {
		echo "No Suggestions Made";
	}
	else if ($db_handle == 0  ){

	}else{?>
	
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
			
			<!--<a href="#updateModal=<?php //echo $user['feedID'];?>"><button id="modalBtn2" class="btn-success"> EDIT</button></a>
			<button class="btn-success" onclick="document.getElementById('updateModal=<?php //echo $user['feedID'];?>').style.display='block'">EDIT</button>-->
			<button class="btn-success"> <a href="approval.php?myid=<?php echo $user['feedID'];?>">Approve</a></button>
			<a href="?deletecat=<?php echo $user['feedID'];?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete The <?php echo $user['feedName'];?> feed?')">DENY</a>
		</td>
	</tr>

	<!--DELETING ITEM -->

		
	
		  <!-- Modal -->

		
		<?php }
	}
	?>		  
	
	<!--DELETING ITEM -->



		  <!-- Modal -->

		
	  



	<!--DELETING AN ITEM -->
	<?php
	  if(isset ($_GET['deletecat']))
	  {
		  
		  $theId=$_GET['deletecat'];
		  $deleteQuery="DELETE FROM feed WHERE feedID='$theId' ";
		  $deleteResults = mysqli_query($connection,$deleteQuery);
		  if ($deleteResults){
			  echo "
			  <script>
			  alert ('Feed Was Denied');
			  window.location.href=('usersuggestions.php');
			  </script>
			  ";
		  }
		  else{
			  echo "
			  <script>
			  alert ('Error!!');
			  window.location.href=('usersuggestions.php');
			  </script>
			  ";
		  }
	  }
	
	

?>


	</tbody>
	</table>


	
		<!--Add Product
		<script src="../js/modal.js"></script>-->
				  
	
		<!--End Of an Add -->
		<?php
	if ($cat_handle == 0  ) {
		
	}
	else{?>
	
	<table>
	<thead>
	<tr>
		<th> Category Id </th>
		<th>Category Name </th>
		<th>User ID</th>
		<th> Action </th>
		
	</tr>
	</thead>
	<tbody>
	<?php
	  foreach($cat_handle as $cat)
	  {?>
	<tr>
		<td> <?php echo $cat['categoryID'];?> </td>
		<td> <?php echo $cat['categoryName'];?> </td>
		<td> <?php echo $cat['userid'];?> </td>
		<td> 
			
			<!--<a href="#updateModal=<?php //echo $user['feedID'];?>"><button id="modalBtn2" class="btn-success"> EDIT</button></a>-->
			
			<button class="btn-success"> <a href="approveCategory.php?myid=<?php echo $cat['categoryID'];?>">Approve</a></button>
			
			<a href="?deleteCat=<?php echo $cat['categoryID'];?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete The <?php echo $cat['categoryName'];?> Category?')">DENY</a>
		</td>
	</tr>

	<!--DELETING ITEM -->

		
	
		  <!-- Modal -->

		
		<?php } ?>		  
	
	<!--DELETING ITEM -->



		  <!-- Modal -->

		
	  



	<!--DELETING AN ITEM -->
	<?php
	  if(isset ($_GET['deleteCat']))
	  {
		  
		  $theId=$_GET['deleteCat'];
		  $deleteQuery="DELETE FROM categories WHERE categoryID='$theId' ";
		  $deleteResults = mysqli_query($connection,$deleteQuery);
		  if ($deleteResults){
			  echo "
			  <script>
			  alert ('Category Was Denied');
			  window.location.href=('usersuggestions.php');
			  </script>
			  ";
		  }
		  else{
			  echo "
			  <script>
			  alert ('Error!!');
			  window.location.href=('usersuggestions.php');
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
