<?php
	if(isset($_POST["submit"])){
		$feedname = $_POST["feedname"];
		$feedlink = $_POST["feedlink"];
		$catID = $_POST["catID"];
		
		require_once 'config.php';
		require_once 'functionsAdmin.php';
			
 

 $invalidurl = false;
 if(@simplexml_load_file($feedlink)){
 	echo "OKAY";
			
 }
 else
 {
  $invalidurl = true;
  echo"<script> 
			alert ('The Feed URL entered is in INVALID. <br> Please Ensure the URL is correct');
			  window.location.href=('feeds_admin.php');
			  </script>";
			exit();
 }


if (feedExists($connection, $feedname, $feedlink) !== false) {
			echo"<script> 
			alert ('The Feed is already in the Database');
			  window.location.href=('feeds_admin.php');
			  </script>";
			exit();
		}
		createFeed($connection,$feedname, $feedlink, $catID);
	}

else{
	header('feeds_admin.php');
	exit();
}

		
			
	



			