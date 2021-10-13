<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Categories page </title>
	<link rel="stylesheet"  href="adminpanel.css">
	<script src="https://kit.fontawesome.com/c5ff6ca8e5.js" crossorigin="anonymous"></script><!--Font awesome code-->
</head>
<body>
	<input type="checkbox" id="nav-toggle">

	<div class="sidebar">
		

		<div class="sidebar-menu">
			<ul>
				<div class="sidebar-brand">
					<h2> <span><img class="img" src="images/logo.png" width=100px height="50px">Taarifa Site</span> </h2>
				</div>
				<li ><a  href="adminpanel.php" > <span class="fas fa-home"> </span> <span> Home</span> </a></li>
				
				<li><a href="categories.php" class="active"> <span class="fas fa-clipboard-list"> </span> <span> Categories</span> </a></li>
				<li><a href="feeds.php"><span class="far fa-newspaper"> </span><span>Feeds</span> </a></li>
				<li><a href="users.php"><span class="fas fa-users"> </span><span> Users </span> </a></li>
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