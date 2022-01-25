
<?php 
include ('retrieveusers.php'); 
$db_handle = retrieveAdmins();
?>
<!DOCTYPE html>
<html>

<!--HTML HEADER-->
<head>
	<meta charset="utf-8">
	<title> Admins Page </title>
	<link rel="stylesheet"  href="../css/adminpanel.css">
	<link rel="stylesheet"  href="../css/categorytable.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				
				<li><a href="categories.php" > <span class="fas fa-clipboard-list"> </span> <span> Categories</span> </a></li>
				<li><a href="feeds.php"><span class="far fa-newspaper"> </span><span>Feeds</span> </a></li>
				<li><a href="users.php"><span class="fas fa-users"> </span><span> Users </span> </a></li>
				<li><a href="admins.php" class="active"> <span class="fas fa-user-tie"> </span><span> Administrators </span></a></li>
			</ul>	
		</div>	
			
	</div>

	<div class="main-content">
		<header>

			<h1>
				
				<label for="nav-toggle"><span class="fas fa-bars"> </span></label> Admin Dashboard
			
			</h1>
		
		<div class="search-wrapper">
			<span class="fas fa-search"> </span>
			<input type="search" placeholder="Search here">
		</div>

		<div class="user-wrapper">
			<span class="far fa-user-circle"></span>
			<div>
				<h4> John Doe</h4>
				<small> Admin </small>
			</div>
		</div>
		</header>
	</div>



<!--PHP Table-->
	<div class="table">
	<button id="myBtn" class="modal-btn">Add Admin</button>
<!--Add Product-->
<script src="modal.js"></script>
		  
<div id="myModal"class="modal-bg">
	<div class="modal">
		<h2>Add User</h2>
		<form action="#" method="POST">
			<label for="username">UserName:</label><br>
			<input type="text" name="username"><br>
			<label for="email">Email:</label><br>
			<input type="email" name="email"><br>
			<label for="password">Password:</label><br>
			<input type="password" name="password"><br>
			<button class="btn-submit" name="submit" type="submit">Submit</button>
			<span class="modal-close"> X </span>
			
		</form>
	</div>
</div>
		<!--End Of an Add -->

	<table>
	<thead>
	<tr>
		<th> AdminId </th>
		<th> UserName </th>
		<th> Email</th>
		<th> Password </th>
		<th> Action </th>
		
	</tr>
	</thead>
	<tbody>
	<?php
	  foreach($db_handle as $user)
	  {?>
	<tr>
		<td> <?php echo $user['adminID'];?> </td>
		<td> <?php echo $user['username'];?> </td>
		<td>  <?php echo $user['email'];?> </td>
		<td>  <?php echo $user['password'];}?></td>
		<td> 
			<a href="<?php echo $product['id'];?>" type="button" class="btn-success" data-toggle="modal" data-target="#updatemodal<?php echo $user['adminID'];?>">EDIT</a>
			<a href="?deleteuser=<?php echo $user['adminID'];?>" type="button" class="btn-danger" onclick="return confirm('Are you sure you want to delete this item')">DELETE</a>
		</td>
	</tr>
	


	<!--DELETING AN ITEM -->
	<?php
	  if(isset ($_GET['deleteuser']))
	  {
		  
		  $theId=$_GET['deleteuser'];
		  $deleteQuery="DELETE FROM users WHERE adminID='$theId'";
		  $deleteResults = mysqli_query($connection,$deleteQuery);
		  if ($deleteResults){
			  echo "
			  <script>
			  alert ('Delete was Succesful');
			  window.location.href=('categories.php');
			  </script>
			  ";
		  }
		  else{
			  echo "
			  <script>
			  alert ('Delete was Unsuccesful');
			  window.location.href=('categories.php');
			  </script>
			  ";
		  }
	  }
		
     ?>
	</tbody>
	</table>
	

</div>
</body>
</html>
