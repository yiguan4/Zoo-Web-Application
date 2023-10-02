<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!isset($_SESSION["P_ID"])){
  header("location: ../index.php?error=1");
  exit();
}
$new_event_id = $_GET["new_event_id"];
$Visitor_ID = $_SESSION["P_ID"];

$sql = "INSERT INTO register VALUES ('$Visitor_ID', '$new_event_id')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

echo "You have successfully registered for the event id =  $new_event_id"."<br>";
//echo "event list after modification:"."<br>";
//include "search_all_event.php";
?>

<a href="index.php">Return to action page</a>
