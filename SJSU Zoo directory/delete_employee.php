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
$department_employee = $_GET["department_employee"];
$delete_employee_id = $_GET["delete_employee_id"];

$sql = "DELETE FROM $department_employee WHERE P_ID = '$delete_employee_id'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Deletion of the employee with ID $delete_employee_id successful!"."<br>";
echo "employee list after modification:"."<br>";
include "search_all_employee.php";
?>

<a href="index.php">Return to action page</a>
