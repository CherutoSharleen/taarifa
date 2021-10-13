<?php
	if(isset($_POST["submit"])){
	
		$category = $_POST["categoryName"];
		$approval ='1';
		
		require_once 'config.php';
		require_once 'functionsAdmin.php';

		if (categoryExists($connection, $category, $approval) !== false) {
			echo"<script> 
			alert ('The Category is already in the Database');
			  window.location.href=('categories_admin.php');
			  </script>";
			exit();
		}
		createCategory($connection, $category, $approval);
	}
	else{
		header("location: categories_admin.php?error=invalid");
		exit();
	}