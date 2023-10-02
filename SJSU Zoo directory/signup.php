<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<!---sign up page--->
<?php
	include_once 'header.php';
?>
<section class="signup-form">

	<hr>
	<h1>Sign Up</h1>
	<hr>
	<div align = "center">
		<div class = "row">
			<form action="includes/signup.inc.php" method="post">
				<input type="text" name="name" placeholder="Full name...">
				<input type="text" name="email" placeholder="Email...">
				<input type="text" name="phone" placeholder="Phone number...">
				<select name="gender">
					<option value="none">Chooce your gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				<input type="password" name="pwd" placeholder="Password...">
				<input type="password" name="pwdrepeat" placeholder="Repeat password...">
				<button type="submit" name="submit" class="btn">Sign Up</button>
			</form>
		</div>
	</div>
	<?php
		if(isset($_GET["error"])){
			if($_GET["error"] == "emptyinput") {
				echo "<p>Fill in all the fields</p>";
			}
			else if($_GET["error"] == "invalidname") {
				echo "<p>the input name is invalid, enter a different name</p>";
			}
			else if($_GET["error"] == "invalidemail") {
				echo "<p>the input email is invalid, enter a correct email</p>";
			}
			else if($_GET["error"] == "invalidgender") {
				echo "<p>choose a gender</p>";
			}
			else if($_GET["error"] == "testcodefail") {
				echo "<p>the password did not match</p>";
			}
			else if($_GET["error"] == "emailtaken") {
				echo "<p>The email is already taken</p>";
			}
			else if($_GET["error"] == "stmtfailed1") {
				echo "<p>Something is wrong...</p>";
			}
			else if($_GET["error"] == "emptyinput2") {
				echo "<p>Something is wrong...</p>";
			}
			else if($_GET["error"] == "none") {
				echo "<p>You have signed up successfully!</p>";
			}
		}
	?>
</section>



<?php
	include_once 'footer.php';
?>
