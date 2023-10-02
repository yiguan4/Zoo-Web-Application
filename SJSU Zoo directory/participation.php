<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
	if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="event_employee")){
		header("location: ../index.php");
		exit();
	}
?>
	<hr>
		<h1>Event</h1>
	<hr>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="add_at_participated.html">Add Participated Animal Trainer</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="add_animal_participated.html">Add Participated Animal</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="delete_at_participated.html">Delete Participated Animal Trainer</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="delete_animal_participated.html">Delete Participated Animal</a></p>


<?php
	include_once 'footer.php';
?>
