<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php

if(isset($_POST["submit"])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$gender = $_POST["gender"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	if(emptyInputSignup($name, $email, $phone, $pwd, $pwdRepeat) !== false){
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	if(invalidName($name) !== false){
		header("location: ../signup.php?error=invalidname");
		exit();
	}
	if(invalidEmail($email) !== false){
		header("location: ../signup.php?error=invalidemail");
		exit();
	}
	if(invalidGender($gender) !== false){
		header("location: ../signup.php?error=invalidgender");
		exit();
	}
	if(pwdMatch($pwd, $pwdRepeat) !== false){
		header("location: ../signup.php?error=testcodefail");
		exit();
	}
	if(emailExists($mysqli, $email, "visitor") !== false){
		header("location: ../signup.php?error=emailtaken");
		exit();
	}

	createUser($mysqli, $name, $email, $phone, $gender, $pwd, $pwdRepeat);
}
else{
	header("location: ../signup.php");
	exit();
}
