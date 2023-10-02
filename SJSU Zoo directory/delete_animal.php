<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="at_employee")){
  header("location: ../index.php");
  exit();
}
$delete_animal_id = $_GET["delete_animal_id"];

$sql = "DELETE FROM animal WHERE A_ID = '$delete_animal_id'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Deletion of the animal with ID $delete_animal_id successful!"."<br>";
echo "Animal list after modification:"."<br>";
include "search_all_animals.php";
?>

<a href="index.php">Return to action page</a>
