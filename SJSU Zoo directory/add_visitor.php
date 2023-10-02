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
$new_visitor_id = $_GET["new_visitor_id"];
$new_visitor_name = $_GET["new_visitor_name"];
$new_visitor_gender = $_GET["new_visitor_gender"];
$new_visitor_phone = $_GET["new_visitor_phone"];
$new_visitor_email = $_GET["new_visitor_email"];
$new_visitor_password = $_GET["new_visitor_password"];
$new_visitor_age = $_GET["new_visitor_age"];
$new_visitor_serverid = $_GET["new_visitor_serverid"];


$sql = "INSERT INTO visitor VALUES ('$new_visitor_id', '$new_visitor_name',
'$new_visitor_gender', '$new_visitor_phone', '$new_visitor_email', '$new_visitor_password',
'$new_visitor_age', '$new_visitor_serverid')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Addition of the new visitor $new_visitor_name successful!"."<br>";
echo "visitor list after modification:"."<br>";
include "search_all_visitor.php";
?>

<a href="index.php">Return to action page</a>
