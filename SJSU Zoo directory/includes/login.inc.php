<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php

if(isset($_POST["submit"])){
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$role = $_POST["role"];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	if(emptyInputLogin($email, $pwd, $role) !== false){
		header("location: ../login.php?error=emptyinput");
		exit();
	}

	loginUser($mysqli, $email, $pwd, $role);
}
else{
	header("location: ../login.php");
	exit();
}
