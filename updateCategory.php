<?php
	if(isset($_POST["submit"])){
	
		$category = $_POST["categoryname"];
		//$approval ='1';
		$id = $_GET["myid"];
		
		require_once 'config.php';
		require_once 'functionsAdmin.php';

		if (categoryExists($connection, $category, $approval) !== false) {
			echo"<script> 
			alert ('The Category Name is already taken');
			  window.location.href=('categories_admin.php');
			  </script>";
			exit();
		}
		updateCategory($connection, $category, $id);
	}
	else{
		header("location: categories_admin.php?error=Invalid");
		exit();
	}