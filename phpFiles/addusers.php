<?php
	if(isset($_POST["submit"])){
		$fullname = $_POST["fullname"];
		$user = $_POST["username"];
		$email = $_POST["email"];
		$pass = $_POST["password"];
		$confirmpass = $_POST["confirmpass"];
		$type = '0';


		require_once 'config.php';
		require_once 'functions.php';

		echo $fullname, $user, $email, $pass, $confirmpass;

		if (emptyInputSignup($fullname, $user, $email, $pass, $confirmpass) !== false) {
			header("location: signupform.php?error=emptyinput");
			exit();
			

		}

		if (invalidUsername($user) !== false) {
			header("location: signupform.php?error=invalidusername");
			exit();
		}
		if (invalidEmail($email) !== false) {
			header("location: signupform.php?error=invalidemail");
			exit();
		}
		if (pwdMatch($pass, $confirmpass) !== false) {
			header("location: signupform.php?error=passwordsdontmatch");
			exit();
		}
		if (usernameExists($connection, $user, $email, $type) !== false) {
			header("location: signupform.php?error=usernametaken");
			exit();
		}
		createUser($connection, $fullname, $user, $email, $pass, $type);
	}
	else{
		header("location: signupform.php");
		exit();
	}
