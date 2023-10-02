<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include_once 'header.php';
if(!isset($_SESSION["P_ID"])){
  header("location: ../index.php");
  exit();
}
include_once 'header.php';
include "db_connect.php";
$keyword_from_form = $_GET["keyword_animal"];
// search the animal database
echo "show result with the word $keyword_from_form"."<br>";
$sql = "SELECT A_ID, A_name, A_age, A_Gender, A_location, A_Status, A_Type, ZD_ID, AT_ID FROM animal
WHERE A_name LIKE '%" . $keyword_from_form . "%'";
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
<a href="index.php">Return to action page</a>
