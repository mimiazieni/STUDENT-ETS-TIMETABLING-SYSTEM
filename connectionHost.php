<?php
/* php & mysql db connection file */
$user = "root"; //mysql username
$pass = ""; //mysql password
$host = "localhost"; //server name or ip address
$dbname = "timetabling"; //your db name

$connectionHost = mysql_connect($host, $user, $pass);

if(isset($connectionHost)){
	mysql_select_db($dbname, $connectionHost) or 
	die("<center>Error: " . mysql_error() . "</center>");
}
else{
	echo "<center>Error: Could not connect to 
	the database.</center>";
}
?>