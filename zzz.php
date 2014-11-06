<?php
include 'connect.php';

$sql = "SELECT title FROM movies WHERE id=1";
$result = mysql_query($sql);
// if ($result) {
//     echo $result;
// }
while($row = mysql_fetch_assoc($result)) {
	echo($row["title"]);
	// echo '<option value="'.$row["title"].'</option>';
	// echo $row["title"];
}
?>