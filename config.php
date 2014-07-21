<?php


$host = "localhost:3306";
$DB_usr_name = "root";
$DB_usr_pswd = "root";
$DB_name = "bus_tracking_db";

$con = mysql_connect($host,$DB_usr_name,$DB_usr_pswd);
mysql_select_db($DB_name,$con);


?>