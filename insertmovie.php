<?php
include 'connect.php';
// producers and actors sent from form 
$title=$_POST['title'];
$year=$_POST['year'];
$director=$_POST['director'];
$producers=$_POST['producers'];
$actors=$_POST['actors'];
$studio=$_POST['studio'];
$rating=$_POST['rating'];
$length=$_POST['length'];
$genre=$_POST['genre'];

$sql="SELECT * FROM movies WHERE title='$title' AND year='$year'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myproducers and $myactors, table row must be 1 row
if($count==0){
	$reg_sql = "INSERT INTO movies (title, year, director, producers, actors, studio, rating, length, genre) VALUES ('$title', '$year', '$director', '$producers', '$actors', '$studio', '$rating', '$length', '$genre')";

	if (mysql_query($reg_sql)) {
	    echo "New record for movies created successfully";
	} else {
	    echo "Error: " . mysql_error($conn);
	}
}
else {
	echo "Movie already exists";
}
?>