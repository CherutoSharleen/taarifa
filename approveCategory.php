<?php
include ('config.php');
$id = $_GET["myid"];

$insertQuery="UPDATE categories SET approval = 1 WHERE categoryID=$id ";
$results=mysqli_query($connection,$insertQuery);
if($results)
{
	echo"
		<script>
		alert('Category Approved');
		window.location.href='usersuggestions.php'
		</script>
	";
}
else
{
	echo"
		<script>
		alert('Error adding Category');
		window.location.href='usersuggestions.php'
		</script>
	
	
	";
}



?>