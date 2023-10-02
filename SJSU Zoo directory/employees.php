<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
  include_once 'header.php';
  if(!($_SESSION["role"]==="zoo_director")){
    header("location: ../index.php");
    exit();
  }
?>
        <h1>Employee Management</h1>
        <hr>
        <p style="font-size: 20px; color:#1F9AFE;"><a href="search_keyword_employee.html">Search employee</a></p>
        <p style="font-size: 20px; color:#1F9AFE;"><a href="add_employee.html">Add employee</a></p>
        <p style="font-size: 20px; color:#1F9AFE;"><a href="update_employee.html">Modify employee</a></p>
        <p style="font-size: 20px; color:#1F9AFE;"><a href="delete_employee.html">Delete employee</a></p>
<?php
  include_once 'footer.php';
?>
