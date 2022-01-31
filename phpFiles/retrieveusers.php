

<?php
include('config.php');

function retrieveUsers()
	{
		
		global $connection;
		 $selectQuery ="SELECT * FROM users WHERE usertype = '0'";
		$usersArray=mysqli_query($connection,$selectQuery);
		$results=array();
		if (mysqli_num_rows($usersArray)>0)
		{
			while ($row=mysqli_fetch_array($usersArray))
			{
				$results[]=$row;
			}
			return $results;
		}
			else
		{
			echo "No Users were found";
		}
		
	}


	//Retrieve Admins
	function retrieveAdmins()
	{
		
		global $connection;
		 $selectQuery ="SELECT * FROM users WHERE usertype = '1'";
		$adminsArray=mysqli_query($connection,$selectQuery);
		$results=array();
		if (mysqli_num_rows($adminsArray)>0)
		{
			while ($row=mysqli_fetch_array($adminsArray))
			{
				$results[]=$row;
			}
			return $results;
		}
			else
		{
			echo "No Admins were found";
		}
		
	}

//For the admin side
	/*function retrieveCategoryNames()
	{
		
		global $connection;
		$categoryQuery="SELECT feed.categoryID, Categories.categoryName
		FROM feed
		INNER JOIN categories ON feed.categoryID = Categories.categoryID;"
		$categoryArray= mysqli_query($connection,$categoryQuery);
		$results=array();
		if (mysqli_num_rows($categoryArray)>0)
		{
			while ($row=mysqli_fetch_array($categoryArray))
			{
				$results[]=$row;
			}
			return $results;
		}
			else
		{
			echo "No Feeds were found";
		}
		
	}*/
	

	function retrieveFeeds()
	{
		
		global $connection;
		
		 $selectQuery ="SELECT * FROM feed WHERE approval = 1";//Those Approved
		$feedsArray=mysqli_query($connection,$selectQuery);
		$results=array();
		if (mysqli_num_rows($feedsArray)>0)
		{
			while ($row=mysqli_fetch_array($feedsArray))
			{
				$results[]=$row;
			}
			return $results;
		}
			else
		{
			echo "No Feeds were found";
		}
		
	}

//FOR THE USER SIDE
	function retrieveFeeds2()
	{
		
		global $connection;
		 $selectQuery ="SELECT * FROM feed WHERE approval = 1 ORDER BY feedName ASC";
		$feedsArray=mysqli_query($connection,$selectQuery);
		$results=array();
		if (mysqli_num_rows($feedsArray)>0)
		{
			while ($row=mysqli_fetch_array($feedsArray))
			{
				$results[]=$row;
			}
			return $results;
		}
			else
		{
			echo "No Feeds were found";
		}
		
	}

	//General categories for the Admin
	function retrieveCategories()
	{
		
		global $connection;
		 $selectQuery ="SELECT * FROM categories WHERE approval = 1";
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
	function countFeeds(){
		global $connection;
		$countQuery="SELECT COUNT(*) FROM feed"; 
		$countNumber=mysqli_query($connection,$countQuery);
		echo $countNumber;

	}
	//Retrieve Categories for the Admin Side

	/* Retrieve the link of a single feed */

function retrieveSavedFeeds()
	{
		
		global $connection;
		$id = $_GET["myid"];
	 $selectQuery ="SELECT * FROM savedfeeds WHERE userid= '$id'";
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
			echo "No Feeds were found";
		}
		
	}
	function retrieveSavedFeedName($feedid)
	{
		
		global $connection;
		
		 $selectQuery ="SELECT feedName FROM feed WHERE feedID= '$feedid'  ";
		$usersArray=mysqli_query($connection,$selectQuery);
		$results=array();
		if (mysqli_num_rows($usersArray)>0)
		{
			while ($row=mysqli_fetch_array($usersArray))
			{
				$results[]=$row;
			}
			return $results;
			
		  
		}
			else
		{
			echo "No Feeds were found";
		}
		
	}
	
	
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

	/* Retrieve according to categories*/
	
	
 
?>
