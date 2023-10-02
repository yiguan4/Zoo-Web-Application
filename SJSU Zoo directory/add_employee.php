<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
include_once 'header.php';
include "db_connect.php";
if(!($_SESSION["role"]==="zoo_director")){
  header("location: ../index.php");
  exit();
}
$department_employee = $_GET["department_employee"];
$new_employee_id = $_GET["new_employee_id"];
$new_employee_name = $_GET["new_employee_name"];
$new_employee_gender = $_GET["new_employee_gender"];
$new_employee_phone = $_GET["new_employee_phone"];
$new_employee_email = $_GET["new_employee_email"];
$new_employee_password = $_GET["new_employee_password"];
$new_employee_did = $_GET["new_employee_did"];


$hashedPwd = password_hash($new_employee_password, PASSWORD_DEFAULT);
$sql = "INSERT INTO $department_employee VALUES ('$new_employee_id', '$new_employee_name',
'$new_employee_gender', '$new_employee_phone', '$new_employee_email', '$hashedPwd',
'$new_employee_did')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Addition of the new employee $new_employee_name successful!"."<br>";
echo "employee list after modification:"."<br>";
include "search_all_employee.php";
?>

<a href="index.php">Return to action page</a>
