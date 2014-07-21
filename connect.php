<?php
$dbhost							= "localhost:3306";
$dbuser							= "root";
$dbpass							= "";
$dbname							= "bus_tracking_db";

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Error connecting to database");
echo $conn;
mysql_select_db($dbname);
?>