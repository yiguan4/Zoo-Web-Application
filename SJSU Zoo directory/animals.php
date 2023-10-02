<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php
  include_once 'header.php';
  if(!(isset($_SESSION["P_ID"]))){
    header("location: ../index.php");
    exit();
  }
?>
        <h1>Our Animals</h1>
        <hr>
<?php

        echo"<p style='font-size: 20px; color:#1F9AFE;'><a href='search_keyword_animal.html'>Search animal</a></p>";
  if($_SESSION["role"]==="at_employee"||$_SESSION["role"]==="zoo_director"){
        echo"<p style='font-size: 20px; color:#1F9AFE;'><a href='update_animal.html'>Modify animal</a></p>";
        if($_SESSION["role"]==="zoo_director"){
              echo"<p style='font-size: 20px; color:#1F9AFE;'><a href='add_animal.html'>Add animal</a></p>";
              echo"<p style='font-size: 20px; color:#1F9AFE;'><a href='delete_animal.html'>Delete animal</a></p>";
        }
  }


  include_once 'footer.php';
?>
