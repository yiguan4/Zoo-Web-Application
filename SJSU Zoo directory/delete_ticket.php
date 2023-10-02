<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="visitor")){
  header("location: ../index.php");
  exit();
}
$uid;
$delete_ticket_id = $_GET["delete_ticket_id"];
if($_SESSION["role"]==="visitor"){
  $uid = $_SESSION["P_ID"];
  $sql = "DELETE FROM ticket WHERE T_ID = '$delete_ticket_id' and P_ID = '$uid'";
}
else{
  $sql = "DELETE FROM ticket WHERE T_ID = '$delete_ticket_id'";
}
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Deletion of the ticket with ID $delete_ticket_id successful!"."<br>";
echo "Ticket list after modification:"."<br>";
include "view_ticket.php";
?>

<a href="index.php">Return to action page</a>
