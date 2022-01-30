<?php
include ('config.php');



	function retrieveFeeds()
	{
		
		global $connection;
		$id = $_GET["myid"];
		 $selectQuery ="SELECT * FROM feed WHERE feedID= '$id' ORDER BY feedName ASC";
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
			echo "No products were found";
		}
		
	}
