
<?php
	session_start();
		if (!isset($_SESSION["userid"])) {
			header("location: loginform_admin.php");
			 }
       elseif ($_SESSION["type"]==0) {
         header("location: loginform_admin.php");
       }



include ('retrieveusers.php'); 
$db_handle = retrieveAdmins();
?>

<!DOCTYPE html>
<html>

<!--HTML HEADER-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Admins Page </title>
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
				<li><a href="feeds_admin.php"><span class="far fa-newspaper"> </span><span>Feeds</span> </a></li>
				<li><a href="usersuggestions.php" ><span class="far fa-newspaper"> </span><span>Suggestions</span> </a></li>
				<li><a href="users_admin.php"><span class="fas fa-users"> </span><span> Users </span> </a></li>
				<li><a href="admins.php"class="active"> <span class="fas fa-user-tie"> </span><span> Administrators </span></a></li>
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
		<button id="modalBtn" class="modal-btn">Add admin</button>
		<!--Add Product
		<script src="../js/modal.js"></script>-->
				  
		<div id="simpleModal"class="modal">
			<div class="modal-content">
				<div class="modal-header">	
					<span class="closeBtn">&times;</span>
					<h2>Add admin</h2>
				</div>
				
				<div class="modal-body">	
				<form action="addadmins_admin.php" method="POST">

					<label for="username">FullName:</label><br>
					<input type="text" name="fullname"><br>
					<label for="username">UserName:</label><br>
					<input type="text" name="username"><br>
					<label for="email">Email:</label><br>
					<input type="email" name="email"><br>
					<label for="password">Password:</label><br>
					<input type="password" name="password">
					<span class="fas fa-eye" aria-hidden="true" onclick="myFunction()"></span>	<br>
					
					<label for="confirmpassword">Confirm Password:</label><br>
					<input type="password" name="confirmpass">
					<span class="fas fa-eye" aria-hidden="true" onclick="myFunction()"></span>	<br>
					
					<button class="btn-submit" name="submit" type="submit">Submit</button>	
				</form>
				</div>
			</div>
		</div>

		<?php
			if(isset($_GET["error"])){
				if ($_GET["error"]=="emptyinput") {
					echo "<p> Fill in all Fields! </p>";
				}
				else if ($_GET["error"]=="invalidUsername") {
					echo "<p> The Username selected is invalid! <br/> Choose a proper one.</p>";
				}
				else if ($_GET["error"]=="invalidEmail") {
					echo "<p> Choose a proper email </p>";
				}
				else if ($_GET["error"]=="passwordsdontmatch") {
					echo "<p> The Passwords don't match </p>";
				}
				else if ($_GET["error"]=="stmtfailed") {
					echo "<p> Something went wrong try again </p>";
				}
				else if ($_GET["error"] == "usernametaken") {
					echo "<p> Username already taken! </p>";
				}
				else if ($_GET["error"] == "none") {
					echo "<p> You have signed up </p>";
				}
			}

		?>



		<!--End Of an Add -->
	
	<table>
	<thead>
	<tr>
		<th> AdminId </th>
		<th> FullName </th>
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
		<td> <?php echo $user['userID'];?> </td>
		<td> <?php echo $user['fullname'];?> </td>
		<td> <?php echo $user['username'];?> </td>
		<td>  <?php echo $user['email'];?> </td>
		<td>  <?php echo $user['password'];?></td>

		<td> 
			
			<!--<a href="#updateModal=<?php //echo $user['adminID'];?>"><button id="modalBtn2" class="btn-success"> EDIT</button></a>-->
			<button class="btn-success" onclick="document.getElementById('updateModal=<?php echo $user['userID'];?>').style.display='block'">EDIT</button>
			
			<a href="?deletecat=<?php echo $user['userID'];?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete Admin <?php echo $user['username'];?> ?')">DELETE</a>
		</td>
	</tr>

	<!--DELETING ITEM -->

		
			<div id="updateModal=<?php echo $user['userID'];?>" class="updatemodal">
			<div class="modal-content">
				<div class="modal-header">	
					  <span onclick="document.getElementById('updateModal=<?php echo $user['userID'];?>').style.display='none'"
						class="closeupdateBtn" title="Close Modal">&times;</span>
					<h2>Update user</h2>
				</div>
				
				<div class="modal-body">	
				<form action="updateusers.php?myid=<?php echo $user['userID'];?>" method="POST">

					<label for="username">Fullname:</label><br>
					<input type="text" name="fullname" value="<?php echo $user['fullname'];?>" ><br>
					<label for="username">User Name:</label><br>
					<input type="text" name="username" value="<?php echo $user['username'];?>" ><br>
					<label for="username">Email:</label><br>
					<input type="text" name="email" value="<?php echo $user['email'];?>" ><br>
					<label for="username">Password:</label><br>
					<input type="text" name="password"  placeholder ="password" ><br>
					<label for="username">Confirm Password:</label><br>
					<input type="text" name="confirmpass" placeholder= "confirmpass" ><br>

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
		  $deleteQuery="DELETE FROM users WHERE userID='$theId'";
		  $deleteResults = mysqli_query($connection,$deleteQuery);
		  if ($deleteResults){
			  echo "
			  <script>
			  alert ('Delete was Succesful');
			  window.location.href=('admins.php');
			  </script>
			  ";
		  }
		  else{
			  echo "
			  <script>
			  alert ('Delete was Unsuccesful');
			  window.location.href=('admins.php');
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

<script>
	function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script><!--Change colour of the Page that your are in -->