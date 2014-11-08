<?php
include 'session.php';
include 'connect.php';
$date = $_GET["date"];
$mid = $_GET["mid"];
$tid = $_GET["tid"];
// echo($date.$mid.$tid);
$result = mysql_query("SELECT * FROM shows where mid='$mid' AND tid='$tid' AND date='$date'");
// $result = mysql_query("SELECT * FROM shows where date='$date'");
while($rows = mysql_fetch_array($result)){
	// echo "YOOOO";
	// echo($rows['showtime']);
      echo"<option value=".$rows['showtime'].">".$rows['showtime']."</option>";
}
?>