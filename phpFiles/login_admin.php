<?php
if (isset($_POST["submit"])) {
	$user= $_POST['username'];
	
	$pass= $_POST['password'];
	$type = '1';

	require_once'config.php';
	require_once'functionsAdmin.php';

	if (emptyInputLogin($user, $pass) !== false) { 
			header("location: loginform_admin.php?error=emptyinput");
			exit();
		}

	loginAdmin($connection, $user, $pass, $type);
}
else{
	header("location: loginform_admin.php?error=irregularlogin");
			exit();
}
