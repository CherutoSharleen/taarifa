<?php 
include '../includes/preuserpageHeader.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
	<script src="https://kit.fontawesome.com/c5ff6ca8e5.js" crossorigin="anonymous"></script>
</head>
<body>

	
	




		
<div class="formdiv">
  <form action='addusers.php' method='POST' class="signup">
  	  <?php
			if(isset($_GET["error"])){
				if ($_GET["error"]=="emptyinput") {
					echo "<p> Fill in all Fields! </p><br><br>";
				}
				else if ($_GET["error"]=="invalidUsername") {
					echo "<p> The Username selected is invalid! <br/> Choose a proper one.</p>";
				}
				else if ($_GET["error"]=="invalidEmail") {
					echo "<p> Choose a proper email </p>";
				}
				else if ($_GET["error"]=="passwordsdontmatch") {
					echo "<p> The Passwords don't match </p><br><br>";
				}
				else if ($_GET["error"]=="stmtfailed") {
					echo "<p> Something went wrong try again </p>";
				}
				else if ($_GET["error"] == "usernametaken") {
					echo "<p> Username already taken! </p>";
				}
				else if ($_GET["error"] == "none") {
					echo "<p> You have signed up </p>";
				}
			}

		?>
      <label for="fname"> Full Name </label><br>
        <input type="text" name="fullname" placeholder="Full Name" required><br>
      
      
      <label for="fname"> Email </label><br>
        <input type="email" name="email" placeholder="Email" required><br>
      
      <label for="fname"> Username</label><br>
        <input type="text" name="username" placeholder="Username" required><br>
     
     <label for="fname"> Password </label><br>
        <input type="password" name="password" placeholder="Password" id="myInput" required>
        <span class="fas fa-eye" aria-hidden="true" onclick="myFunction()"></span>  <br>
      
      <label for="fname"> Confirm Password </label><br>
        <input type="password" name="confirmpass" placeholder="Confirm Password" id="myInput2" required>
        <span class="fas fa-eye" aria-hidden="true" onclick="myFunction2()"></span> <br>
      
      
       
        <input type="submit" name="submit" value="SignUp">
    
      <div class="signup-link">
        Already a member? <a href="loginform.php"> Login</a>
      </div>
    
    </form>
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
