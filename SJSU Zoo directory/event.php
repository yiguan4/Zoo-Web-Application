<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
	if(!(isset($_SESSION["P_ID"]))){
		header("location: ../index.php");
		exit();
	}
?>
	<hr>
		<h1>Event</h1>
	<hr>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="search_keyword_event.html">Search Event</a></p>
	<?php
		if(($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="event_employee")){
	?>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="add_event.html">Add Event</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="update_event.html">Modify Event</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="delete_event.html">Delete Event</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="participation.php">Participation Management</a></p>
	<?php
	}
	?>
	<?php
		if(($_SESSION["role"]==="visitor")){
	?>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="register.html">Register Event</a></p>
	<?php
	}
	?>

<?php
	include_once 'footer.php';
?>
