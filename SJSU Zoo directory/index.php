<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<!---home page--->
<?php
	//echo 'Current PHP version: ' . phpversion();
	//$pwd="first123";
	//$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	//echo $hashedPwd;
	include_once 'header.php';
?>
		<section class="index-intro">
		<hr>
			<h1>SJSU Zoo Database</h1>
		<hr>


		</section>
		<?php
		if(!isset($_SESSION["P_ID"])){
			echo "<br><h2>Welcome to SJSU Zoo!</h2>";
		}

		if(isset($_SESSION["P_ID"])){
			echo "<h3>You have logged in as ", $_SESSION["role"], "</h3>";
			echo "<h2 style='margin: 5%'>Welcome back, ", $_SESSION["P_name"], "!</h2>";
		}

		?>
<?php
	include_once 'footer.php';
?>
