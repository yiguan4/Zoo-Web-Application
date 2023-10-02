<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
	session_start()
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>SJSU ZOO</title>
	<link rel="stylesheet" href="/style.css">
</head>

<body>
	<nav>
		<div class="wrapper">
			<ul>
				<?php
					if(isset($_SESSION["P_ID"])){
						echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
						echo "<li><a href='profile.php'>Profile</a></li>";
						echo "<li><a href='animals.php'>Our Animals</a></li>";
						echo "<li><a href='questionlist.php'>Q&A</a></li>";
						if($_SESSION["role"]==="visitor" || $_SESSION["role"]==="zoo_director"){
							echo "<li><a href='ticket.php'>Tickets</a></li>";
						}
						if($_SESSION["role"]==="vs_employee"){
							echo "<li><a href='visitors.php'>Visitors</a></li>";
						}
						if($_SESSION["role"]==="zoo_director"){
							echo "<li><a href='member.php'>Members</a></li>";
						}
						echo "<li><a href='event.php'>Event</a></li>";
					}
					else{
						echo "<li><a href='signup.php'>Sign Up</a></li>";
						echo "<li><a href='login.php'>Log In</a></li>";
					}
				?>
				<li><a href="index.php">Home</a></li>
			</ul>
		</div>
	</nav>
	<div class="wrapper">
