<?php
	session_start();
		if (!isset($_SESSION["userid"])) {
			header("location: loginform_admin.php");
			 }
       elseif ($_SESSION["type"]==0) {
         header("location: loginform_admin.php");
       }


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <title> Administrator page </title> 
	<link rel="stylesheet"  href="../css/adminpanel.css">
		
	<script src="https://kit.fontawesome.com/c5ff6ca8e5.js" crossorigin="anonymous"></script><!--Font awesome code-->
</head>
<body>
	<!--<div id = "myDIV">-->
<input type="checkbox" id="nav-toggle">

  <div class="sidebar">
    

    <div class="sidebar-menu">
      <ul>
        <div class="sidebar-brand">
          <h2> <span><img class="img" src="../images/logo.png" width=100px height="50px">Taarifa Site</span> </h2>
        </div>
        <li ><a  href="adminpanel.php" class="active" > <span class="fas fa-home"> </span> <span> Home</span> </a></li>
        
        <li><a href="categories_admin.php" > <span class="fas fa-clipboard-list"> </span> <span> Categories</span> </a></li>
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

	<div class="content">
<div class="row">
			<div class="column">
 <div class="blog-card">
     <div class="content">
     	
       <h2><a class="title" href="feeds_admin.php" target="_blank">Feeds</a></h2>
      </div> 
     <div class="text">
      <!--Returns string from an element in array then slice divides the string and explode defines limitations -->
       <?php

		include ('count.php'); 
		$user = retrieveCountFeeds();
		?>
     </div>
   

     </div>
</div>
<div class="column">
    <div class="blog-card">
     <div class="content">
     	
       <h2><a class="title" href="categories_admin.php" target="_blank">Categories:</a></h2>
       
     </div>
     <div class="text">
      <!--Returns string from an element in array then slice divides the string and explode defines limitations -->
		
      <?php $cat = retrieveCountCategories(); ?>
     </div>
   </div>
</div>
</div>
<div class="row">
<div class="column">
    <div class="blog-card">
     <div class="content">
     	
       <h2><a class="title" href="users_admin.php" target="_blank">Users</a></h2>
       
     </div>
     <div class="text">
      <!--Returns string from an element in array then slice divides the string and explode defines limitations -->
		
      <?php $cat = retrieveCountUsers(); ?>
     </div>
   </div>
</div>
<div class="column">
      <div class="blog-card">
     <div class="content">
     	
       <h2><a class="title" href="admins.php" target="_blank">Admins</a></h2>
       
     </div>
     <div class="text">
      <!--Returns string from an element in array then slice divides the string and explode defines limitations -->
		
      <?php $cat = retrieveCountAdmins(); ?>
     </div>
   </div>
</div>
</div>

</div>
</body>
</html>



