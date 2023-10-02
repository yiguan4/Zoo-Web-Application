<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="at_employee")){
  header("location: ../index.php");
  exit();
}

$new_animal_id = $_GET["new_animal_id"];
$new_animal_name = $_GET["new_animal_name"];
$new_animal_age = $_GET["new_animal_age"];
$new_animal_gender = $_GET["new_animal_gender"];
$new_animal_location = $_GET["new_animal_location"];
$new_animal_status = $_GET["new_animal_status"];
$new_animal_type = $_GET["new_animal_type"];
//$new_animal_zdid = $_GET["new_animal_zdid"];
$new_animal_atid = $_GET["new_animal_atid"];


$sql = "INSERT INTO animal VALUES ('$new_animal_id', '$new_animal_name', '$new_animal_age',
'$new_animal_gender', '$new_animal_location', '$new_animal_status', '$new_animal_type',
'Z10000', '$new_animal_atid')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Addition of the new animal $new_animal_name successful!"."<br>";
echo "Animal list after modification:"."<br>";
include "search_all_animals.php";
?>

<a href="index.php">Return to action page</a>
