
<!--<?php
	//include '../includes/userpageHeader.php';
?>	-->
<?php 
include '../includes/userpageHeader.php';
include ('retrieveusers.php'); 
$db_handle = retrieveFeeds2();
/*include ('retrieveSavedFeeds.php'); 
$feed_handle = retrieveSavedFeeds();*/

?>
<!DOCTYPE html>
<html>
<head>
	<title> Feeds </title>

	<link rel="stylesheet" type="text/css" href="../css/categoriesIndex.css">
	
</head>
<body>
	
<div class="cover">
	<?php
		  foreach($db_handle as $user)
	  {?>	
	
	<div class="blog-card">

			<div class="content">
			<a href="?savefeed=<?php echo $user['feedID'];?>" type="button"><i class="fa fa-bookmark" aria-hidden="true">  Save Feed</i></a>
					<div class="title2"><a href="site/php.php?myid=<?php echo $user['feedID']; ?>" target="_blank"><?php echo $user['feedName'];?></a> </div>
		<!--<div class="title2"><a href="retrieveFeeds2.php?myid=<?php //echo $user[//'feedID']; ?>" target="_blank"><?php //echo $user[//'feedName'];?></a> </div>-->
		<!--<?php
		//$url = $user['feedLink'];
		
 		 $feeds = //simplexml_load_file($url);
 		 $image = $feeds->channel->image->url;

 		

		?>
		<img src="<?php //echo $image;?>"/> 
				
				<button><a href="retrieveFeeds2.php?myid=<?php //echo $user['feedID']; ?>" target="new window"> <i class="fas fa-arrow-circle-right"></i></a></button>-->
			</div>
			
		
	</div>
<?php } ?>

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
			  window.location.href=('displayFeeds.php');
			  </script>";
			exit();
			}
		  elseif(saveFeed($connection,$theId,$userid)){
		  
		  		echo"<script> 
			alert ('Feed Saved Successfully.');
			 window.location.href=('displayFeeds.php');
			  </script>";
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
