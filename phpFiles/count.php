<?php 
include 'config.php';
function retrieveCountFeeds(){
		global $connection;

			$sql="SELECT * FROM feed";

			if ($result=mysqli_query($connection,$sql))
			  {
			  // Return the number of rows in result set
			  $rowcount=mysqli_num_rows($result);
			  echo $rowcount;
			  // Free result set
			  mysqli_free_result($result);
			  }
	 }
	 function retrieveCountAdmins(){
		global $connection;

			$sql="SELECT * FROM users WHERE usertype = '1'";

			if ($result=mysqli_query($connection,$sql))
			  {
			  // Return the number of rows in result set
			  $rowcount=mysqli_num_rows($result);
			  echo $rowcount;
			  // Free result set
			  mysqli_free_result($result);
			  }
	 }
	  function retrieveCountUsers(){
		global $connection;

			$sql="SELECT * FROM users WHERE usertype = '0' ";

			if ($result=mysqli_query($connection,$sql))
			  {
			  // Return the number of rows in result set
			  $rowcount=mysqli_num_rows($result);
			  echo $rowcount;
			  // Free result set
			  mysqli_free_result($result);
			  }
	 }
	   function retrieveCountCategories(){
		global $connection;

			$sql="SELECT * FROM categories";

			if ($result=mysqli_query($connection,$sql))
			  {
			  // Return the number of rows in result set
			  $rowcount=mysqli_num_rows($result);
			  echo $rowcount;
			  // Free result set
			  mysqli_free_result($result);
			  }
	 }
