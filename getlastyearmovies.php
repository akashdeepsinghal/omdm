<?php
include 'session.php';
include 'connect.php';
$year = $_GET["year"];

$result = mysql_query("SELECT * FROM movies where year=$year");
while($rows = mysql_fetch_array($result)){
      echo"<option value=".$rows['id'].">".$rows['title']."</option>";
}
?>