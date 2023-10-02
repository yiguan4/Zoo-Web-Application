<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director")){
  header("location: ../index.php");
  exit();
}
$department_employee = $_GET["department_employee"];
$keyword_from_form = $_GET["keyword_employee"];
// search the employee database
echo "show result with the word $keyword_from_form"."<br>";
$sql = "SELECT * FROM $department_employee
WHERE P_name LIKE '%" . $keyword_from_form . "%'";
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
<a href="index.php">Return to action page</a>
