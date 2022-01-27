
<!--<?php
	//include '../includes/userpageHeader.php';
?>	-->
<?php 
include '../includes/userpageHeader.php';
include ('retrieveusers.php'); 
$db_handle = retrieveCategories();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Categories </title>
	<link rel="stylesheet" type="text/css" href="../css/categoriesIndex.css">
	
</head>
<body>
	
<div class="cover">
	<?php
		  foreach($db_handle as $user)
	  {?>	
	
	<div class="blog-card">

			<div class="content">
		<div class="title"><a href="retrieveCategories2.php?myid=<?php echo $user['categoryID']; ?>" ><?php echo $user['categoryName'];?></a> </div>
				
				<button><a href="retrieveCategories2.php?myid=<?php echo $user['categoryID']; ?>" target="new window"> View Websites </a></button>
			</div>
			
		
	</div>
<?php } ?>
</div>
</body>
</html>
