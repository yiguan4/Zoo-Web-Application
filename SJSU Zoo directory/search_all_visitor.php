<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="vs_employee")){
  header("location: ../index.php");
  exit();
}
include "db_connect.php";
// search the employee database
$sql = "SELECT * FROM visitor";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["P_ID"]. " - Name: " . $row["P_name"]. " - Gender: " .
    $row["P_Gender"]. " - Phone: " . $row["Phone"]. " - Email: " . $row["Email"].
    " - Password: " . $row["P_Password"]. " - Age: " . $row["V_age"]. " - Server ID: " . $row["Server_ID"]."<br><br>";
}
} else {
echo "0 results";
}
?>
