<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director")){
  header("location: ../index.php");
  exit();
}
$department_employee = $_GET["department_employee"];
$update_employee_id = $_GET["update_employee_id"];
$update_employee_name = $_GET["update_employee_name"];
$update_employee_gender = $_GET["update_employee_gender"];
$update_employee_phone = $_GET["update_employee_phone"];
$update_employee_email = $_GET["update_employee_email"];
$update_employee_password = $_GET["update_employee_password"];
$update_employee_did = $_GET["update_employee_did"];


$hashedPwd = password_hash($update_employee_password, PASSWORD_DEFAULT);
$sql = "UPDATE $department_employee SET P_name = '$update_employee_name',
P_Gender = '$update_employee_gender', Phone = '$update_employee_phone',
Email = '$update_employee_email', P_Password = '$hashedPwd',
D_ID = '$update_employee_did'
WHERE P_ID = '$update_employee_id'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
echo "Update of the employee $update_employee_name successful!"."<br>";
echo "employee list after modification:"."<br>";
include "search_all_employee.php";
?>

<a href="index.php">Return to action page</a>
