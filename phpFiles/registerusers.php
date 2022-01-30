<?php
include ('config.php');
if (isset ($_POST ['submit']))
{
	$fname=$_POST['username'];
	$mname=$_POST['email'];
	$sname=$_POST['password'];
}


$insertQuery = "INSERT INTO users(username,email,password) VALUES ('$username','$email','$password')";
//$results=mysql_query($connection,$insertQuery);
if($connection->query($insertQuery) === TRUE)
{
	echo"
	<script>
	window.location.href=('table.php');
	</script>
	
	";
}
else
{
	echo"
	<script>
	window.location.href=('patient.php');
	</script>
	";
}

$connection->close();

?>
