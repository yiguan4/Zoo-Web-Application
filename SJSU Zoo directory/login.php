<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<!---log in page--->
<?php
	include_once 'header.php';
?>
<section class="login-form">

	<hr>
	<h1>Log In</h1>
	<hr>
	<div align = "center">
		<div class = "row">
			<form action="includes/login.inc.php" method="post">
				<input type="text" name="email" placeholder="Email...">
				<input type="password" name="pwd" placeholder="Password...">
				<select name="role">
					<option value="none">Log in as...</option>
					<option value="visitor">Visitor</option>
					<option value="zoo_director">Zoo Director</option>
					<option value="at_employee">Animal Trainer</option>
					<option value="event_employee">Event Employee</option>
					<option value="vs_employee">Visitor Management Employee</option>
				</select>
				<button type="submit" name="submit" class="btn">Log In</button>
			</form>
		</div>
	</div>
	<?php
		if(isset($_GET["error"])){
			if($_GET["error"] == "emptyinput") {
				echo "<p>Fill in all the fields</p>";
			}
			else if($_GET["error"] == "wronglogin") {
				echo "<p>Either the email or the password is wrong, try again</p>";
			}
			else if($_GET["error"] == "invalidemail") {
				echo "<p>the input email is invalid, enter a correct email</p>";
			}
		}
	?>
</section>

<?php
	include_once 'footer.php';
?>
