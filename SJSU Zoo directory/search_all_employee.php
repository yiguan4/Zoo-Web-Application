<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director")){
  header("location: ../index.php");
  exit();
}
include "db_connect.php";
$department_employee = $_GET["department_employee"];
// search the employee database
$sql = "SELECT * FROM $department_employee";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["P_ID"]. " - Name: " . $row["P_name"]. " - Gender: " .
    $row["P_Gender"]. " - Phone: " . $row["Phone"]. " - Email: " . $row["Email"].
    " - Password: " . $row["P_Password"]. " - Department ID: " . $row["D_ID"]."<br><br>";
}
} else {
echo "0 results";
}
?>
