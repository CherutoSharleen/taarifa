<?php
	if(isset($_POST["submit"])){
		$feedname = $_POST["feedname"];
		$feedlink = $_POST["feedlink"];
		$catID = $_POST["catID"];
		$id = $_GET["myid"];
		$approval = '0';

		require_once 'config.php';
		require_once 'functions.php';
			
 

 $invalidurl = false;
 if(@simplexml_load_file($feedlink)){
 	if (feedExists($connection, $feedname, $feedlink) !== false) {
			echo"<script> 
			alert ('The Feed is already in the Database');
			  window.location.href=('library.php?myid=$id');
			  </script>";
			exit();
		}
	else{
		createFeed($connection,$feedname, $feedlink, $catID, $id, $approval);	
	
	}
			
 }
 else
 { 
  $invalidurl = true;
  echo"<script> 
			alert ('The Feed URL entered is in INVALID.Please Ensure the URL is correct');
			  window.location.href=('library.php?myid=$id');
			  </script>";
			exit();
 }



	}

else{
	header('library.php?myid=<?php echo $id;?>');
	exit();
}

		
			
	



			
