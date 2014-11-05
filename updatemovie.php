<?php
include 'session.php';
include 'connect.php';

$id = $_POST['id'];
$director=$_POST['director'];
$producers=$_POST['producers'];
$actors=$_POST['actors'];
$studio=$_POST['studio'];
$rating=$_POST['rating'];
$length=$_POST['length'];
$genre=$_POST['genre'];

$sql="SELECT * FROM movies WHERE id='$id'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myproducers and $myactors, table row must be 1 row
if($count==1){
	$reg_sql = "UPDATE movies SET director='$director', producers='$producers', actors='$actors', studio='$studio', rating='$rating', length='$length', genre='$genre' WHERE id='$id'";

	if (mysql_query($reg_sql)) {
	    echo "Record for movies updated successfully";
	} else {
	    echo "Error: " . mysql_error($conn);
	}
}
elseif ($count == 0) {
	echo "No such movie exists!!";
}
else {
	echo "Multiple movies!?";
}
?>