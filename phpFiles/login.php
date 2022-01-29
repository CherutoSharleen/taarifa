<?php
if (isset($_POST["submit"])) {
	$user= $_POST['username'];
	$pass= $_POST['password'];
		$type = '0';


	require_once'config.php';
	require_once'functions.php';

	if (emptyInputLogin($user, $pass) !== false) {
			header("location: loginform.php?error=emptyinput");
			exit();
		}

	loginUser($connection, $user, $pass, $type);
}
else{
	header("location: loginform.php?error=irregularlogin");
			exit();
}
