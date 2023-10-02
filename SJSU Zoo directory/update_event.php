<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="event_employee")){
  header("location: ../index.php");
  exit();
}
$update_event_id = $_GET["update_event_id"];
$update_event_name = $_GET["update_event_name"];
$update_event_location = $_GET["update_event_location"];
$update_event_time = $_GET["update_event_time"];

$sql = "UPDATE zooevent SET E_name = '$update_event_name',
E_location = '$update_event_location', E_time = '$update_event_time'
WHERE E_ID = '$update_event_id'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));




echo "Update of the existing event $update_event_name successful!"."<br>";
echo "event list after modification:"."<br>";
include "search_all_event.php";
?>

<a href="index.php">Return to action page</a>
