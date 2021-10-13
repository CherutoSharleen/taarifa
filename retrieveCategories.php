<?php
include ('config.php');



	function retrieveCategories()
	{
		
		global $connection;
		$id = $_GET["myid"];
		//$id ="3";
		 $selectQuery ="SELECT * FROM feed WHERE categoryID= '$id' ORDER BY feedName ASC";
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
			 
			  </script>
			  ";
		  
		}
			else
		{
			echo "No Categories were found";
		}
		
	}