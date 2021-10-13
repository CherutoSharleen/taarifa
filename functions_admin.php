<?php
//include('config.php');
function emptyInputSignup($fullname, $user, $email, $pass, $confirmpass){
	$result;
	if (empty($fullname) || empty($user) || empty($email) ||empty($pass) ||empty($confirmpass) ) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidUsername($user){
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidEmail($email){
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function pwdmatch($pass, $confirmpass){
	$result;
	if ($pass != $confirmpass) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}


function usernameExists($connection, $user, $email){
	$sql = "SELECT * FROM admin WHERE username = ? OR email = ?;";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signup.php?error=preparedsqlstatementnotcorrect");
			exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $user, $email );
	mysqli_stmt_execute($stmt);

	$resultsData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultsData)){
		return $row;

	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);

}

function createUser($connection, $fullname, $user, $email, $pass){
	$sql = "INSERT INTO admin (fullname, username, email, password) VALUES(?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signup.php?error=preparedsqlstatementnotcorrect");
			exit();
	}

	$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss",$fullname, $user, $email, $hashedPwd );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location:adminpanel.php");
	exit();

}

