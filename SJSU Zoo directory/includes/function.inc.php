<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
function emptyInputSignup($name, $email, $phone, $pwd, $pwdRepeat){
	$result;
	if(empty($name) || empty($email) || empty($phone) || empty($pwd) || empty($pwdRepeat)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function invalidName($name){
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function invalidEmail($email){
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function pwdMatch($pwd, $pwdRepeat){
	$result;
	if($pwd !== $pwdRepeat){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function invalidGender($gender){
	$result;
	if($gender === "none"){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function emailExists($mysqli, $email, $role){
	$sql;
	if($role === "visitor"){
		$sql = "SELECT * FROM visitor WHERE Email = ?;";
	}
	else if($role=="zoo_director"){
		$sql = "SELECT * FROM zoo_director WHERE Email = ?;";
	}
	else if($role=="at_employee"){
		$sql = "SELECT * FROM at_employee WHERE Email = ?;";
	}
	else if($role=="event_employee"){
		$sql = "SELECT * FROM event_employee WHERE Email = ?;";
	}
	else if($role=="vs_employee"){
		$sql = "SELECT * FROM vs_employee WHERE Email = ?;";
	}
	$stmt = mysqli_stmt_init($mysqli);
	echo $sql;
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../signup.php?error=stmtfailed1");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}
	else{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}
function createUser($mysqli, $name, $email, $phone, $gender, $pwd, $pwdrepeat){
	//
	//$newID = 'T10230';
	$sql = "INSERT INTO visitor (P_name, Email, Phone, P_Gender, P_Password) VALUES (?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($mysqli);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../signup.php?error=stmtfailed2");
		exit();
	}
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $gender, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?error=none");
	exit();
}

function emptyInputLogin($email, $pwd){
	$result;
	if(empty($email) || empty($pwd)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function loginUser($mysqli, $email, $pwd, $role){
	$userEmailExists=emailExists($mysqli, $email, $role);

	if($userEmailExists===false){
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $userEmailExists["P_Password"];
	$checkPwd = password_verify($pwd, $pwdHashed);
	if($checkPwd === false){
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	else if($checkPwd === true){
		session_start();
		$_SESSION["P_ID"] = $userEmailExists["P_ID"];
		$_SESSION["P_name"] = $userEmailExists["P_name"];
		$_SESSION["Email"] = $userEmailExists["Email"];
		$_SESSION["role"] = $role;
		header("location: ../index.php");
		exit();
	}
}

function updataProfile($mysqli, $updateName, $updateGender, $updatePhone, $updateEmail, $updateAge){
	$userID=$_SESSION["P_ID"];
	$role=$_SESSION["role"];
	if($updateEmail!==$_SESSION["Email"]){
		if(emailExists($mysqli, $updateEmail, $role) !== false){
			header("location: ../profileUpdate.php?error=emailtaken");
			exit();
		}
	}
	if($role === "visitor"){
		$sql = "UPDATE visitor SET P_name=?, P_Gender=?, Phone=?, Email=?, V_Age=?
		WHERE P_ID=?";
	}
	else if($role=="zoo_director"){
		$sql = "UPDATE zoo_director SET P_name=?, P_Gender=?, Phone=?, Email=?
		WHERE P_ID=?";
	}
	else if($role=="at_employee"){
		$sql = "UPDATE at_employee SET P_name=?, P_Gender=?, Phone=?, Email=?
		WHERE P_ID=?";
	}
	else if($role=="event_employee"){
		$sql = "UPDATE event_employee SET P_name=?, P_Gender=?, Phone=?, Email=?
		WHERE P_ID=?";
	}
	else if($role=="vs_employee"){
		$sql = "UPDATE vs_employee SET P_name=?, P_Gender=?, Phone=?, Email=?
		WHERE P_ID=?";
	}
	$stmt = mysqli_stmt_init($mysqli);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../profileUpdate.php?error=stmtfailedupdate");
		exit();
	}
	if($role === "visitor"){
		mysqli_stmt_bind_param($stmt, "ssssss", $updateName, $updateGender, $updatePhone, $updateEmail, $updateAge, $userID);
	}
	else{
		mysqli_stmt_bind_param($stmt, "sssss", $updateName, $updateGender, $updatePhone, $updateEmail, $userID);
	}
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../profile.php?error=none");
	exit();
}

function emptyInputProfile($updateName, $updateGender, $updatePhone, $updateEmail, $updateAge){
	$result;
	$role=$_SESSION["role"];
	if($role==="visitor" && empty($updateAge)){
		$result = true;
	}
	else if(empty($updateName) || empty($updateGender) || empty($updatePhone) || empty($updateEmail)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
