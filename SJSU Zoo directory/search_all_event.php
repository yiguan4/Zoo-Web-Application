<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="event_employee")){
  header("location: ../index.php");
  exit();
}
// search the employee database
$sql = "SELECT * FROM zooevent";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["E_ID"]. " - Name: " . $row["E_name"]. " - location: " .
    $row["E_location"]. " - time: " . $row["E_time"]."<br>";
    $E_ID=$row["E_ID"];
    $sqlAt = "SELECT P_name
              FROM at_employee JOIN at_participated on P_ID = AT_ID
              WHERE E_ID = '$E_ID' ";
              $resultAt = $mysqli->query($sqlAt);
    //echo $resultAt->num_rows;
    if ($resultAt->num_rows > 0) {
        echo "participated animal trainer: <br>";
      while($rowAt = $resultAt->fetch_assoc()){
        echo $rowAt["P_name"]."<br>";
      }
    }
    $sqlA = "SELECT A_name
              FROM animal a JOIN animal_participated p on a.A_ID = p.A_ID
              WHERE E_ID = '$E_ID' ";
              $resultA = $mysqli->query($sqlA);
    //echo $resultA->num_rows;
    if ($resultA->num_rows > 0) {
        echo "participated animal: <br>";
      while($rowA = $resultA->fetch_assoc()){
        echo $rowA["A_name"]."<br>";
      }
    }
    echo "<br><br>";

}
} else {
echo "0 results";
}
?>
