<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
  include_once 'header.php';
  if(!($_SESSION["role"]==="zoo_director"||$_SESSION["role"]==="vs_employee")){
    header("location: ../index.php");
    exit();
  }
?>
        <h1>Visitor Management</h1>
        <hr>
        <p style="font-size: 20px; color:#1F9AFE;"><a href="search_keyword_visitor.html">Search visitor</a></p>
        <!--
        <p style="font-size: 20px; color:#1F9AFE;"><a href="add_visitor.html">Add visitor</a></p>
        -->
        <p style="font-size: 20px; color:#1F9AFE;"><a href="update_visitor.html">Modify visitor</a></p>
        <p style="font-size: 20px; color:#1F9AFE;"><a href="delete_visitor.html">Delete visitor</a></p>
    </body>
</html>
