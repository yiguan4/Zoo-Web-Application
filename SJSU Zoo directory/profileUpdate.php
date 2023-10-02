<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<!---profile update page--->
<?php
	include_once 'header.php';
	include('includes/dbh.inc.php');
	if(!isset($_SESSION["P_ID"])){
		header("location: ../index.php");
		exit();
	}

?>

<div align = "center">
	<hr>
		<h1> Update Your Profile</h1>
	<hr>

			<form action = "includes/profile.inc.php" method="post">
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
								?>


						<table>
				<tr>
					<td>Name</td><td>: </td><td>
						<input type="text" name="updateName"  value="<?php echo $row['P_name'];?>">
					</td>
				</tr>
				<tr>
					<td>Gender</td><td>: </td><td>
						<input type="text" name="updateGender"  value="<?php echo $row['P_Gender'];?>">
					</td>
				</tr>
				<tr>
					<td>Phone</td><td>: </td><td>
						<input type="text" name="updatePhone"  value="<?php echo $row['Phone'];?>">
					</td>
				</tr>
				<tr>
					<td>Email</td><td>: </td><td>
						<input type="email" name="updateEmail"  value="<?php echo $row['Email'];?>">
					</td>
				</tr>
				<?php
				if($role==="visitor"){
				?>
				<tr>
					<td>Age</td><td>: </td><td>
						<input type="text" name="updateAge"  value="<?php echo $row['V_age'];?>">
					</td>
				</tr>
				<?php
				}
				?>
				</table>
				<input type="submit" name="update" class="btn btn-info" value="Update">

			</form>

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
		else if($_GET["error"] == "emailtaken") {
			echo "<p>The email is already taken</p>";
		}
		else if($_GET["error"] == "stmtfailed1") {
			echo "<p>Something is wrong...</p>";
		}
	}
?>
<?php
	include_once 'footer.php';
?>
