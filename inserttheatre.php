<?php
include 'connect.php';
// producers and actors sent from form 
$tname=$_POST['tname'];

$sql="SELECT * FROM theatres WHERE tname='$tname'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myproducers and $myactors, table row must be 1 row
if($count==0){
	$reg_sql = "INSERT INTO theatres (tname) VALUES ('$tname')";

	if (mysql_query($reg_sql)) {
	    echo "New record for theatres created successfully";
	} else {
	    echo "Error: " . mysql_error($conn);
	}
}
else {
	echo "Theare already exists!";
}
?>