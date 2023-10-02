<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="at_employee")){
  header("location: ../index.php");
  exit();
}
$sql = "SELECT A_ID, A_name, A_age, A_Gender, A_location, A_Status, A_Type, ZD_ID, AT_ID FROM animal";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["A_ID"]. " - Name: " . $row["A_name"]. " - Age: " . $row["A_age"]. " - Gender: " .
    $row["A_Gender"]. " - location: " . $row["A_location"]. " - status: " . $row["A_Status"].
    " - type: " . $row["A_Type"]. " - Department ID: " . $row["ZD_ID"]. " - AT_ID: " . $row["AT_ID"]."<br><br>";
}
} else {
echo "0 results";
}
?>
