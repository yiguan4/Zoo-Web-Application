<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="at_employee")){
  header("location: ../index.php");
  exit();
}
$update_animal_id = $_GET["update_animal_id"];
$update_animal_name = $_GET["update_animal_name"];
$update_animal_age = $_GET["update_animal_age"];
$update_animal_gender = $_GET["update_animal_gender"];
$update_animal_location = $_GET["update_animal_location"];
$update_animal_status = $_GET["update_animal_status"];
$update_animal_type = $_GET["update_animal_type"];
$update_animal_zdid = $_GET["update_animal_zdid"];
$update_animal_atid = $_GET["update_animal_atid"];

$sql = "UPDATE animal SET
A_name = '$update_animal_name', A_age = '$update_animal_age',
A_Gender = '$update_animal_gender', A_location = '$update_animal_location',
A_Status = '$update_animal_status', A_Type = '$update_animal_type',
ZD_ID = '$update_animal_zdid', AT_ID = '$update_animal_atid'
WHERE A_ID = '$update_animal_id'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Update of the animal $update_animal_name successful!"."<br>";
echo "Animal list after modification:"."<br>";
include "search_all_animals.php";
?>

<a href="index.php">Return to action page</a>
