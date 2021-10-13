<?php
	if(isset($_POST["submit"])){
		$category = $_POST["categoryName"];
		
		require_once 'config.php';
		require_once 'functionsAdmin.php';

		if (categoryExists($connection, $category) !== false) {
			echo"<script> 
			alert ('The Category is already in the Database');
			  window.location.href=('categories_admin.php');
			  </script>";
			exit();
		}
		createCategory($connection, $category);
	}
	else{
		header("location: categories_admin.php");
		exit();
	}