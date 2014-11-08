<?php
include 'session.php';
include 'connect.php';
$mid = $_GET["mid"];
$tid = $_GET["tid"];
$result = mysql_query("SELECT * FROM shows where mid='$mid' AND tid='$tid'");
while($rows = mysql_fetch_array($result)){
	// echo($rows['date']);
      // echo"<option value=".$theatres_array[$i].">".$trows['tname']."</option>";
}
?>