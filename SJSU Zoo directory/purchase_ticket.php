<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="visitor")){
  header("location: ../index.php?error=1");
  exit();
}
$uid = $_GET["uid"];
$Visitor_ID = $_SESSION["P_ID"];
//$Visitor_age = $_SESSION["V_age"];
$tier;
//if($Visitor_age<18 || $Visitor_age>65){
  $tier="S";
//}
//else{
//  $tier="R";
//}

$sql = "INSERT INTO ticket (P_ID, Tier_Level) VALUES ('$Visitor_ID', '$tier')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

echo $uid . ", You have successfully purchase your ticket!<br>";
?>

<a href="view_ticket.php">View your ticket</a><br>
<a href="index.php">Return to action page</a>
