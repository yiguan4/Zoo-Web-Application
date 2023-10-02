<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
	session_start();
if(isset($_POST["update"])){
	//$userID = $_SESSION["P_ID"];
	$updateName = $_POST["updateName"];
	$updateGender = $_POST["updateGender"];
	$updatePhone = $_POST["updatePhone"];
	$updateEmail = $_POST["updateEmail"];
	if($_SESSION["role"]==="visitor"){
		$updateAge = $_POST["updateAge"];
	}
	else{
		$updateAge = null;
	}


	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	if(emptyInputProfile($updateName, $updateGender, $updatePhone, $updateEmail, $updateAge) !== false){
		header("location: ../profileUpdate.php?error=emptyinput");
		exit();
	}
	if(invalidName($updateName) !== false){
		header("location: ../profileUpdate.php?error=invalidname");
		exit();
	}
	if(invalidEmail($updateEmail) !== false){
		header("location: ../profileUpdate.php?error=invalidemail");
		exit();
	}
	updataProfile($mysqli, $updateName, $updateGender, $updatePhone, $updateEmail, $updateAge);
}

else{
	header("location: ../index.php");
	exit();
}
