<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director")){
  header("location: ../index.php");
  exit();
}
$delete_visitor_id = $_GET["delete_visitor_id"];

$sql = "DELETE FROM visitor WHERE P_ID = '$delete_visitor_id'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Deletion of the visitor with ID $delete_visitor_id successful!"."<br>";
echo "visitor list after modification:"."<br>";
include "search_all_visitor.php";
?>

<a href="index.php">Return to action page</a>
