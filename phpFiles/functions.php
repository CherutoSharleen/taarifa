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

function createUser($connection, $fullname, $user, $email, $pass, $type){
	$sql = "INSERT INTO users(fullname, username, email, password, usertype) VALUES(?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signup.php?error=preparedsqlstatementnotcorrect");
			exit();
	}

	$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssss",$fullname, $user, $email, $hashedPwd, $type );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: loginform.php?error=welcome");
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

function loginUser($connection, $user, $password, $type){
	$usernameExists = usernameExists($connection, $type, $user, $user);
	if($usernameExists === false) {
		header("location: loginform.php?error=wronglogin");
		exit();
	}
	$pwdHashed = $usernameExists["password"];
	$checkPwd = password_verify($password, $pwdHashed);

	if ($checkPwd === false) {
		header("location: loginform.php?error=wronglogin");
		exit();
	}
	else if ($checkPwd === true){
		session_start();
		$_SESSION["userid"] = $usernameExists["userID"];
		$_SESSION["user"] = $usernameExists["username"];
		header("location:home.php");
		exit();
	}
}
function feedExists($connection, $feedname, $feedlink){
	$sql = "SELECT * FROM feed WHERE feedName =? OR feedLink=? AND approval = 1;";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: categories_admin.php?error=preparedsqlstatementnotcorrect");
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
function createFeed($connection, $feedname, $feedlink, $catID, $id, $approval){

	$sql = "INSERT INTO feed(feedName, feedLink, categoryid, userid, approval) VALUES(?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: library.php?myid=<?php echo $id?error=preparedsqlstatementnotcorrect");
			exit();
	}



	mysqli_stmt_bind_param($stmt, "sssss",$feedname, $feedlink, $catID, $id, $approval );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: library.php?myid=$id");
	exit();

}
function categoryExists($connection, $category, $approval){
	$sql = "SELECT * FROM categories WHERE categoryName =? AND approval = 1;";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: categories.php?error=preparedsqlstatementnotcorrect");
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
function createCategory($connection, $category, $id, $approval){
	$sql = "INSERT INTO categories(categoryName, userid, approval) VALUES(?, ?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: library.php?error=preparedsqlstatementnotcorrect");
			exit();
	}
	


	mysqli_stmt_bind_param($stmt, "sss",$category, $id, $approval );
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: library.php?myid=$id");
	exit();


}
function saveFeed($connection,$feedid,$userid){
	$sql = "INSERT INTO savedfeeds(feedid, userid) VALUES(?, ?);";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: displayFeeds.php?error=preparedsqlstatementnotcorrect");
			exit();
	}



	mysqli_stmt_bind_param($stmt, "ss",$feedid, $userid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	echo"<script> 
			alert ('Feed Saved Successfully.');
			 window.location.href=('savedFeeds.php?myid=$userid');
			  </script>";
	exit();
}
function alreadySavedFeed($connection,$theId,$userid){
	$sql = "SELECT * FROM savedfeeds WHERE feedid =? AND userid=?;";
	$stmt = mysqli_stmt_init($connection); //using prepared statements prevent sql injection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: displayFeeds.php?error=preparedsqlstatementnotcorrect");
			exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $theId, $userid );
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

