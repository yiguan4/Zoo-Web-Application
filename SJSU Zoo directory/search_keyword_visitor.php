<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
include "db_connect.php";
include_once 'header.php';
if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="vs_employee")){
  header("location: ../index.php");
  exit();
}
$keyword_from_form = $_GET["keyword_visitor"];
// search the visitor database
echo "show result with the word $keyword_from_form"."<br>";
$sql = "SELECT * FROM visitor
WHERE P_name LIKE '%" . $keyword_from_form . "%'";
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
<a href="index.php">Return to action page</a>
