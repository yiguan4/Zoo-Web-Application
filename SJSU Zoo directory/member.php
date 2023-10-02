<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
	if(!($_SESSION["role"]==="zoo_director")){
		header("location: ../index.php");
		exit();
	}
?>
	<hr>
		<h1>Members</h1>
	<hr>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="employees.php">Manage Employee</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="visitors.php">Manage Visitors</a></p>
<?php
	include_once 'footer.php';
?>
