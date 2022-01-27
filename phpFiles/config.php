<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="taarifa";
$connection = mysqli_connect($hostname,$username,$password,$dbname);

if (!$connection) {
	die("Connection Failed: ".mysqli_connect_error());
}

