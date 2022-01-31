<?php
include ('config.php');



	function retrieveSavedFeeds()
	{
		
		global $connection;
		$id = $_GET["myid"];
		 $selectQuery ="SELECT * FROM savedfeeds WHERE userid= '$id' ";
		$usersArray=mysqli_query($connection,$selectQuery);
		$results=array();
		if (mysqli_num_rows($usersArray)>0)
		{
			while ($row=mysqli_fetch_array($usersArray))
			{
				$results[]=$row;
			}
			return $results;
			 
			  echo "
			  <script>
			 
			  window.location.href=('retrieveFeeds2.php');
			  </script>
			  ";
		  
		}
			else
		{
			echo "No Feeds were found";
		}
		
	}
