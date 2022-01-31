<?php
include ('config.php');


	function retrieveFeedsSuggestions()
	{
//		$id = 1;
		global $connection;
		$id = $_GET["myid"];
		 $selectQuery ="SELECT * FROM feed WHERE userid= '$id' AND approval = 0 ORDER BY feedName ASC";
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
			 
			  window.location.href=('library.php?myid=$id');
			  </script>
			  ";
		  
		}
			else
		{
			echo "No Feeds were found";
		}
		
	}
	function retrieveCategoriesSuggestions()
	{
//		$id = 1;
		global $connection;
		$id = $_GET["myid"];
		 $selectQuery ="SELECT * FROM categories WHERE userid= '$id' AND approval = 0 ORDER BY categoryName ASC";
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
			 
			  window.location.href=('library.php?myid=$id');
			  </script>
			  ";
		  
		}
			else
		{
			echo "No categories were found";
		}
		
	}
