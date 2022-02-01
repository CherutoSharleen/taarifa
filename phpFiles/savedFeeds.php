
<!--<?php
	//include '../includes/userpageHeader.php';
?>	-->
<?php 
include '../includes/userpageHeader.php';
include ('retrieveusers.php'); 
$db_handle = retrieveSavedFeeds();

?>

<!DOCTYPE html>
<html>
<head>
	<title> Feeds </title>

	<link rel="stylesheet" type="text/css" href="../css/categoriesIndex.css">
	
</head>
<body>
	<div class="cover">
		<h7>
<?php
	if($db_handle == 0)
	{
		echo "You have Not Saved Any Feeds Yet.";
		}
		else{?></h7>

	
	
	<?php
		  foreach($db_handle as $user)
	  {?>	
	
	<div class="blog-card">

			<div class="content">

		<div class="title2"><a href="retrieveFeeds2.php?myid=<?php echo $user['feedid']; ?>" target="_blank"><?php 
		$id=$user["feedid"];
		$feeds_handle = retrieveSavedFeedName($id); 
		foreach($feeds_handle as $feed)
	  {	
	  	echo $feed["feedName"];


		?></a> </div><br>
		<a href="?deletecat=<?php echo $user['feedid'];?>" type="button" class="modal-btn2"onclick="return confirm('Are you sure you want to delete <?php echo $feed["feedName"] ?> Feed From Your Saved Feeds?')">DELETE</a>
				<!--<button><a href="retrieveFeeds2.php?myid=<?php //echo $user['feedID']; ?>" target="new window"> <i class="fas fa-arrow-circle-right"></i></a></button>-->
			</div>
			
		
	</div>
<?php } } }?>
<?php
	  if(isset ($_GET['deletecat']))
	  {
		  $userid = $_SESSION['userid'];
		  $theId=$_GET['deletecat'];
		  $deleteQuery="DELETE FROM savedfeeds WHERE feedid='$theId'";
		  $deleteResults = mysqli_query($connection,$deleteQuery);
		  if ($deleteResults){
			  echo "
			  <script>
			  alert ('Delete was Succesful');
			  window.location.href=('savedFeeds.php?myid=$userid');
			  </script>
			  ";
		  }
		  else{
			  echo "
			  <script>
			  alert ('Delete was Unsuccesful');
			  window.location.href=('savedFeeds.php?myid=$userid');
			  </script>
			  ";
		  }
	  }

	
?>	
</div>
</div>
</body>
</html>
