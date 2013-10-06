<?php

session_start();
ob_start();
$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="test_create_db.members"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect($host, $username, $password, $db_name)or die("cannot connect"); 
#mysqli_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($con,$myusername);
$mypassword = mysqli_real_escape_string($con,$mypassword);
#$sql = "INSERT INTO $tbl_name (username, password) VALUES ($myusername,$mypassword)";

$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' ";
$search = mysql_query($sql) or die("cannot run query");

// Mysql_num_row is counting table row
$count = mysql_num_rows($search);

if($count==1)
{
	echo "Username in use";
} else
{
	$result = mysqli_query($con,"INSERT INTO $tbl_name (username,password) VALUES ('$myusername','$mypassword')") or die("cannot run query");

	if($result)
	{
		echo "Success!";
	}
}




?>