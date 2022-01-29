
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
	if (!preg_match("/^[a-zA-Z0-9.', ]*$/", $user)) {
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



/*function createUser($connection, $fullname, $user, $email, $pass){
	$sql = "INSERT INTO admin(fullname, username, email, password) VALUES(?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signupform_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}

	$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss",$fullname, $user, $email, $hashedPwd );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: loginform_admin.php");
	exit();

}*/

function createAdmin($connection, $fullname, $user, $email, $pass, $type){
	$sql = "INSERT INTO users(fullname, username, email, password, usertype) VALUES(?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: admins.php?error=preparedsqlstatementnotcorrect");
			exit();
	}

	$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssss",$fullname, $user, $email, $hashedPwd, $type );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: admins.php");
	exit();

}
function usernameExists($connection, $type, $user, $email){
	$sql = "SELECT * FROM users WHERE usertype = ? AND username = ? OR email = ?";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signup.php?error=preparedsqlstatementnotcorrect");
			exit();
	}
	
	
	mysqli_stmt_bind_param($stmt, "sss", $type, $user, $email);
	mysqli_stmt_execute($stmt);

	$resultsData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultsData)){
		return $row;

	}
	else {
		$result = false;
		return $result;
		//return $usertype;
	}

	mysqli_stmt_close($stmt);

}


function createUserAdmin($connection, $fullname, $user, $email, $pass, $type){
	$sql = "INSERT INTO users(fullname, username, email, password, usertype) VALUES(?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: users_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}

	$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssss",$fullname, $user, $email, $hashedPwd, $type );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: users_admin.php");
	exit();
 
}




function emptyInputLogin($user, $password){
	$result;
	if ( empty($user) || empty($password) ) {
	$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function adminExists($connection, $type, $user, $email){
	$sql = "SELECT * FROM users WHERE usertype = ? AND username = ? OR email = ?";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signup.php?error=preparedsqlstatementnotcorrect");
			exit();
	}
	
	
	mysqli_stmt_bind_param($stmt, "sss", $type, $user, $email);
	mysqli_stmt_execute($stmt);

	$resultsData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultsData)){
		return $row;

	}
	else {
		$result = false;
		return $result;
		//return $usertype;
	}

	mysqli_stmt_close($stmt);

}

function loginAdmin($connection, $user, $password, $type){
	$adminExists = adminExists($connection, $type, $user, $user);
	if($adminExists === false) {
		header("location: loginform_admin.php?error=wronglogin");
		exit();
	}
	$pwdHashed = $adminExists["password"];
	$checkPwd = password_verify($password, $pwdHashed);

	if ($checkPwd === false) {
		header("location: loginform_admin.php?error=wronglogin");
		exit();
	}
	else if ($checkPwd === true){
		session_start();
		$_SESSION["userid"] = $adminExists["userID"];
		$_SESSION["user"] = $adminExists["username"];
		$_SESSION["type"] = $adminExists["usertype"];
		header("location:adminpanel.php");
		exit();
	}
}

function categoryExists($connection, $category, $approval){
	$sql = "SELECT * FROM categories WHERE categoryName =? AND approval = 1;";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: categories_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}
	mysqli_stmt_bind_param($stmt, "s", $category );
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
function createCategory($connection, $category, $approval){
	$sql = "INSERT INTO categories(categoryName, approval) VALUES(?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: categories_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}
	


	mysqli_stmt_bind_param($stmt, "ss",$category, $approval );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: categories_admin.php?error=success");
	exit();


}
function feedExists($connection, $feedname, $feedlink){
	$sql = "SELECT * FROM feed WHERE feedName =? OR feedLink=? AND approval = 1;";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: feeds_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $feedname, $feedlink );
	mysqli_stmt_execute($stmt);

	$resultsData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultsData)){
		//return $row;

	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);

}

function createFeed($connection, $feedname, $feedlink, $catID){
	$sql = "INSERT INTO feed(feedName, feedLink, categoryid) VALUES(?, ?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: feeds_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}



	mysqli_stmt_bind_param($stmt, "sss",$feedname, $feedlink, $catID );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: feeds_admin.php");
	exit();

}

function updateUser($connection, $fullname, $user, $email, $pass, $type, $id){
	$sql = "UPDATE users SET fullname = ?, username = ?, email = ?, password = ?, usertype = ? WHERE userID ='$id';";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: users_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}

	$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssss",$fullname, $user, $email, $hashedPwd, $type );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: users_admin.php");
	exit();
 
}

function updateAdmin($connection, $fullname, $user, $email, $pass, $type, $id){
	$sql = "UPDATE users SET fullname = ?, username = ?, email = ?, password = ?, usertype = ? WHERE userID ='$id';";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: users_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}

	$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssss",$fullname, $user, $email, $hashedPwd, $type );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: admins.php");
	exit();
 
}
function updateCategory($connection,$category, $id){
	$sql = "UPDATE categories SET categoryName = ? WHERE categoryID ='$id';";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: categories_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}



	mysqli_stmt_bind_param($stmt, "s",$category );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: categories_admin.php?error=invalid");
	exit();
 
}
function updateFeed($connection,$feedname, $feedlink, $catID, $id){
	$sql = "UPDATE feed SET feedName = ?, feedLink = ?, categoryid = ? WHERE feedID ='$id';";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: feeds_admin.php?error=preparedsqlstatementnotcorrect");
			exit();
	}



	mysqli_stmt_bind_param($stmt, "sss",$feedname, $feedlink, $catID );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: feeds_admin.php?error=success");
	exit();
 
}
