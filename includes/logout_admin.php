<?php
	session_start();
	session_unset();
	session_destroy();

	header("location: ../php/loginform_admin.php");
	exit();