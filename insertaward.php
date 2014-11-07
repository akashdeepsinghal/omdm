<?php
include 'connect.php';
// producers and actor sent from form 
$type=$_POST['type'];
$year=$_POST['year'];
$mid=$_POST['mid'];
$director=$_POST['director'];
$actor=$_POST['actor'];

$sql="SELECT * FROM awards WHERE year=$year";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

// If result matched $myproducers and $myactor, table row must be 1 row
if ($count == 0) {
	if ($type == 'movie') {
		$insertsql = "INSERT INTO awards (year, movie) VALUES ('$year', '$mid')";
	} elseif ($type == 'director') {
		$insertsql = "INSERT INTO awards (year, director) VALUES ('$year', '$director')";
	} elseif ($type == 'actor') {
		$insertsql = "INSERT INTO awards (year, actor) VALUES ('$year', '$actor')";
	} else {
		echo "Incorrect type!";
	}
	if (mysql_query($insertsql)) {
	    echo "New award for best ".$type." for the year ".$year;
	} else {
	    echo "Error: " . mysql_error($conn);
	}
} elseif($count>0){
	if ($type == 'movie') {
		$updatesql = "UPDATE awards SET `movie`='$movie' WHERE year=$year";
	} elseif ($type == 'director') {
		$updatesql = "UPDATE awards SET `director`='$director' WHERE year=$year";
	} elseif ($type == 'actor') {
		$updatesql = "UPDATE `awards` SET `actor`='$actor' WHERE year=$year";
	} else {
		echo "Incorrect type!";
	}
	if (mysql_query($updatesql)) {
	    echo "New award for best ".$type." for the year ".$year;
	} else {
	    echo "Error: " . mysql_error($conn);
	}
}
else {
	echo "Some error";
}
?>