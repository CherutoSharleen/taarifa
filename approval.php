<?php
include ('config.php');
$id = $_GET["myid"];

$insertQuery="UPDATE feed SET approval = 1 WHERE feedID=$id ";
$results=mysqli_query($connection,$insertQuery);
if($results)
{
	echo"
		<script>
		alert('Feed Approved');
		window.location.href='usersuggestions.php'
		</script>
	";
}
else
{
	echo"
		<script>
		alert('Error adding Feed');
		window.location.href='usersuggestions.php'
		</script>
	
	
	";
}



?>