<?php
	if(isset($_POST["submit"])){
		$feedname = $_POST["feedname"];
		$feedlink = $_POST["feedlink"];
		$catID = $_POST["catID"];
		$approval = '1';
		$id = $_GET["myid"];


		require_once 'config.php';
		require_once 'functionsAdmin.php';
			
 
if (empty($feedname) || empty($feedlink) || empty($catID) ) {
		echo"<script> 
			alert ('Fill In all the Input Fields');
			window.location.href=('feeds_admin.php');
			  </script>";
			exit();
	}

 $invalidurl = false;
 if(@simplexml_load_file($feedlink)){
 		
	
			
 }
 else
 { 
  $invalidurl = true;
  echo"<script> 
			alert ('The Feed URL entered is in INVALID.<br/>Please Ensure the URL is correct');
			  window.location.href=('feeds_admin.php');
			  </script>";
			exit();
 }
 updateFeed($connection,$feedname,$feedlink, $catID, $id);	
}

else{
	header('feeds_admin.php?error=Invalid');
	exit();
}

		
			
	



			