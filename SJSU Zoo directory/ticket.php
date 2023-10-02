<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
	if(!($_SESSION["role"]==="visitor" || $_SESSION["role"]==="zoo_director")){
		header("location: ../index.php");
		exit();
	}
?>
	<hr>
		<h1>Ticket</h1>
	<hr>
	<?php
		if($_SESSION["role"]==="visitor"){
	?>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="view_ticket.php">View Ticket</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="purchase_ticket.html">Purchase Ticket</a></p>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="delete_ticket.html">Return Ticket</a></p>
	<?php
		}
	?>
	<?php
		if($_SESSION["role"]==="zoo_director"){
	?>
	<p style="font-size: 20px; color:#1F9AFE;"><a href="delete_ticket.html">Delete Ticket</a></p>
	<?php
		}
	?>
<?php
	include_once 'footer.php';
?>
