<?php

session_start();
ob_start();
$host="localhost"; // Host name 
$db_name="test"; // Database name 
$tbl_name="test_create_db.members"; // Table name 

mysql_connect("$host")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql = mysql_query("SELECT `id`, `username`, `password` FROM `members` WHERE 1");

echo $sql;

?>