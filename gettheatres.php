<?php
include 'session.php';
include 'connect.php';

$mid = $_GET["mid"];
$result = mysql_query("SELECT * FROM movies where id='$mid'");
while($rows = mysql_fetch_array($result)){
  $theatres = $rows['theatres'];
  $theatres_array = explode(", ", $theatres);
  for ($i=0; $i <sizeof($theatres_array) ; $i++) {
    $theatreresult = mysql_query("SELECT * FROM theatres where id='$theatres_array[$i]'");
    while ($trows = mysql_fetch_array($theatreresult)) {
      echo"<option value=".$theatres_array[$i].">".$trows['tname']."</option>";
    }
    
  }
}
?>