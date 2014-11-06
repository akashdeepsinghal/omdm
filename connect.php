<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="moviedb"; // Database name 
$tbl_name="people"; // Table name 

// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password");
$select_db = mysql_select_db("$db_name");
?>