<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="event_employee")){
  header("location: ../index.php");
  exit();
}
$delete_event_id = $_GET["delete_event_id"];
$delete_at_id = $_GET["delete_at_id"];

$sql = "DELETE FROM at_participated WHERE E_ID = '$delete_event_id' and AT_ID = '$delete_at_id'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Deletion of the participation with event ID $delete_event_id with the animal trainer ID $delete_at_id successful!"."<br>";
echo "event list after modification:"."<br>";
include "search_all_event.php";
?>

<a href="index.php">Return to action page</a>
