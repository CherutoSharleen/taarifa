<?php
	session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/box.css">
	<script src="https://kit.fontawesome.com/c5ff6ca8e5.js" crossorigin="anonymous"></script><!--Font awesome code-->
</head>

	<div class="navbar">
				<img src="../images/logo.png" class="logo">
				<ul>
					<li><a href="home.php"> Home </a></li>
					<li><a href="displayFeeds.php"> Feeds</a></li>
					<li><a href="categoriesIndex.php"> Categories</a></li>
					<li><a href="savedFeeds.php?myid=<?php echo $_SESSION['userid']; ?>"> Saved Feeds</a></li>
					<!--<?php $myid //= 1 ?>-->
					<li><a href="library.php?myid=<?php echo $_SESSION['userid']; ?>"> Suggestions </a></li>
					<!--<li><a href="saved.php?myid=<?php //echo $_SESSION['userid']; ?>"> Suggestions </a></li>-->

					<li><small><a href="../includes/logout.php"> LOGOUT </small></a></li>
					<li><a href="#">
						<?php
						 if (!isset($_SESSION["userid"])) {
						 	header("location: ../index.html");
						 	
						 }
						

						?>
							<div>
								<span class="far fa-user-circle"></span>
							
								<h4> Welcome <?php echo $_SESSION["user"]; ?></h4>
							</div>	
								
							
						</a>
						
						
					</li>
				</ul>
			</div>
			<script type="text/javascript">
					
			</script>
		


</html>