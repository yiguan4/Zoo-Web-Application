<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="vs_employee")){
  header("location: ../index.php");
  exit();
}
$update_visitor_id = $_GET["update_visitor_id"];
$update_visitor_name = $_GET["update_visitor_name"];
$update_visitor_gender = $_GET["update_visitor_gender"];
$update_visitor_phone = $_GET["update_visitor_phone"];
$update_visitor_email = $_GET["update_visitor_email"];
$update_visitor_password = $_GET["update_visitor_password"];
$update_visitor_age = $_GET["update_visitor_age"];
$update_visitor_serverid = $_GET["update_visitor_serverid"];

$hashedPwd = password_hash($update_visitor_password, PASSWORD_DEFAULT);
$sql = "UPDATE visitor SET P_name = '$update_visitor_name',
P_Gender = '$update_visitor_gender', Phone = '$update_visitor_phone', Email = '$update_visitor_email', P_Password = '$hashedPwd',
V_age = '$update_visitor_age', Server_ID = '$update_visitor_serverid'
WHERE P_ID = '$update_visitor_id'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Update of the existing visitor $update_visitor_name successful!"."<br>";
echo "visitor list after modification:"."<br>";
include "search_all_visitor.php";
?>

<a href="index.php">Return to action page</a>
