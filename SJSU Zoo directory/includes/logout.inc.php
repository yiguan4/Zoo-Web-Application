<!---
SJSU CMPE 138 Fall 2021 TEAM6
--->
<?php

session_start();
session_unset();
session_destroy();
header("location: ../index.php");
exit();
