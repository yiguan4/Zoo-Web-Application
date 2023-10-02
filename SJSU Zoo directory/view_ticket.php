<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="visitor")){
  header("location: ../index.php");
  exit();
}
include "db_connect.php";

if($_SESSION["role"]==="visitor"){
  $P_ID = $_SESSION["P_ID"];
  $sql = "SELECT * FROM ticket WHERE P_ID = '$P_ID'";
}

// search the employee database
else{
  $sql = "SELECT * FROM ticket";
}
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "ticket id: " . $row["T_ID"]. " - P_ID: " . $row["P_ID"]. " - Ticket Tier Level: " .
    $row["Tier_Level"]. "<br>";
}
} else {
echo "0 results";
}
?>
