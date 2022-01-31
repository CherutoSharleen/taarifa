
<?php
include('config.php');

	function retrieveSingleFeed()
	{
		
		global $connection;
		 $selectQuery ="SELECT feedLink FROM feed";
		$categoriesArray=mysqli_query($connection,$selectQuery);
		$results=array();
		if (mysqli_num_rows($categoriesArray)>0)
		{
			while ($row=mysqli_fetch_array($categoriesArray))
			{
				$results[]=$row;
			}
			return $results;
		}
			else
		{
			echo "No Categories were found";


		}
		
	}

?>
