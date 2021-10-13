
<!--<?php
	//include '../includes/userpageHeader.php';
?>	-->
<?php 
include '../includes/userpageHeader.php';
include ('retrieveCategories.php'); 
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
		<h2>
	<?php if ($db_handle == 0)
		echo "No Feeds Found in This Category";
	else{ ?></h2>

		<?php
	  foreach($db_handle as $user )
	  {?>	
	
	<div class="blog-card">

			<div class="content">
				<a href="?savefeed=<?php echo $user['feedID'];?>" type="button"><i class="fa fa-bookmark" aria-hidden="true">  Save Feed</i></a>
		<div class="title2"><a href="retrieveFeeds2.php?myid=<?php echo $user['feedID']; ?>" target="_blank"><?php echo $user['feedName'];?></a> </div>
				
				<button><a href="retrieveFeeds2.php?myid=<?php echo $user['feedID']; ?>" target="_blank"> Read More </a></button>
			</div>
			
	</div>
<?php }
} ?>
	
<?php


	  if(isset ($_GET['savefeed']))
	  {
		 require_once 'config.php';
		require_once 'functions.php';
	
		  $theId=$_GET['savefeed'];
		  $userid = $_SESSION['userid'];
		  
		   if (alreadySavedFeed($connection,$theId,$userid) !== false) {
			echo"<script> 
			alert ('You have already saved this Feed');
			  window.location.href=('savedFeeds.php?myid=$userid');
			  </script>";
			exit();
			}
		  elseif(saveFeed($connection,$theId,$userid)){
		  
		  		/*echo"<script> 
			alert ('Feed Saved Successfully.');
			 window.location.href=('savedFeeds.php?myid=$userid');
			  </script>";*/
			exit();
		  	}
	  
	  else{
	  	echo"<script> 
			alert ('Error.');
			 
			  </script>";		
	  }
	}
?>	


</div>	


</body>
</html>