<?php 
include '../includes/preuserpageHeader.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body>
<div class="formdiv">	
		<?php
			if(isset($_GET["error"])){
				if ($_GET["error"]=="emptyinput") {
					echo "<p> Fill in all Fields! </p>";
				}
				else if ($_GET["error"]=="wronglogin") {
					echo "<p> One or Both Your Login Credentials are wrong</p><p>Please Try Again</p>";
				}
				else if ($_GET["error"]=="welcome") {
					echo "<h2> Welcome To The Taarifa Site</h2><br>";
				}
			}

		?>
	
		<form action='login.php' method='POST' class="login">
			 <label for="fname"> Email/Username</label><br>
        <input type="text" name="username" placeholder="Email/Username" required><br>
     
     <label for="fname"> Password </label><br>
        <input type="password" name="password" placeholder="Password" id="myInput" required>
        <span class="fas fa-eye" aria-hidden="true" onclick="myFunction()"></span>  <br>
			
			
				
			
				<input type="submit" name="submit" value="Login"><br>
			
				Not a member? <a href="signupform.php"> Join Us</a><br>
			
			
		</form>
	

	</div>

</div>
</body>
</html>

<script>
	function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script><!--Change colour of the Page that your are in -->