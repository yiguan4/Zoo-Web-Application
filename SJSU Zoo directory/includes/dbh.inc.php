<!---
SJSU CMPE 138 Fall 2021 TEAM6
db connection
--->
<?php
//change the following
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "password";
$dBName = "zoo";

$mysqli = new mysqli($serverName, $dBUsername, $dBPassword, $dBName);
if ($mysqli->connect_errno){
	echo "failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//echo $mysqli->host_info . "\n";
