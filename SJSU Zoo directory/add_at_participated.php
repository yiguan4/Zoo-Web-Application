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
$new_event_id = $_GET["new_event_id"];
$new_at_employee_id = $_GET["new_at_employee_id"];

$sql = "INSERT INTO at_participated VALUES ('$new_at_employee_id', '$new_event_id')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

echo "Addition of the new participation for animal trainer id = $new_at_employee_id successful!"."<br>";
echo "event list after modification:"."<br>";
include "search_all_event.php";
?>

<a href="index.php">Return to action page</a>
