<?php
include 'session.php';
include 'connect.php';
$mid = $_GET["mid"];

$result = mysql_query("SELECT * FROM movies where id=$mid");
while($rows = mysql_fetch_array($result)){
	echo $rows['director'];
}
?>