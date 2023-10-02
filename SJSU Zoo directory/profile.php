<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<!---profile page--->
<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
	if(!isset($_SESSION["P_ID"])){
		header("location: ../index.php");
		exit();
	}
?>

<section class="profile-form">
	<hr>
		<h1>Profile</h1>
	<hr>
	<?php
		$userID = $_SESSION["P_ID"];
		$role=$_SESSION["role"];
		if($role === "visitor"){
			$sql = "SELECT * FROM visitor WHERE P_ID = ?;";
		}
		else if($role=="zoo_director"){
			$sql = "SELECT * FROM zoo_director WHERE P_ID = ?;";
		}
		else if($role=="at_employee"){
			$sql = "SELECT * FROM at_employee WHERE P_ID = ?;";
		}
		else if($role=="event_employee"){
			$sql = "SELECT * FROM event_employee WHERE P_ID = ?;";
		}
		else if($role=="vs_employee"){
			$sql = "SELECT * FROM vs_employee WHERE P_ID = ?;";
		}
		$stmt = mysqli_stmt_init($mysqli);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../index.php?error=stmtfailedprofile");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "s", $userID);
		mysqli_stmt_execute($stmt);
		$resultData = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($resultData);
		mysqli_stmt_close($stmt);
		echo "Name: ", $row['P_name'], "<br>";
		echo "Gender: ", $row['P_Gender'], "<br>";
		echo "Phone: ", $row['Phone'], "<br>";
		echo "Email: ", $row['Email'], "<br>";
		if($role==="visitor"){
			echo "Age: ", $row['V_age'], "<br>";
		}
		echo "<a href='profileUpdate.php'> Update Your Profile </a><br><br>";
		if(isset($_GET["error"])){
			if($_GET["error"] == "none") {
				echo "<h3>You have updated your profile!</h3>";
			}
		}
	?>


</section>

<?php
	include_once 'footer.php';
?>
