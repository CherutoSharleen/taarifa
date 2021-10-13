<?php
	if(isset($_POST["submit"])){
		$id = $_GET["myid"];
		$category = $_POST["categoryName"];
		$approval ='0';
		
		require_once 'config.php';
		require_once 'functions.php';
		if(empty($category)){
			echo"<script> 
			alert ('Please Enter A Category Name');
			  window.location.href=('library.php?myid=$id');
			  </script>";
			exit();
		}
		if(invalidUsername($category)!==false){
			echo"<script> 
			alert ('Please Use Valid Characters');
			  window.location.href=('library.php?myid=$id');
			  </script>";
			exit();
		}
		if (categoryExists($connection, $category, $approval) !== false) {
			echo"<script> 
			alert ('The Category is already in the Database');
			  window.location.href=('library.php?myid=$id');
			  </script>";
			exit();
		}
		createCategory($connection, $category,$id, $approval);
	}
	else{
		header("location: library.php?myid=$id");
		exit();
	}