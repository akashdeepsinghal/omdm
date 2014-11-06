<?php
include 'session.php';
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?> | Manage Movies</title>
	<style type="text/css">
	table{
		text-align: center;
	}
	</style>
</head>
<body>
	<a href="add_movie.php">Add a movie</a>
<?php 
	$sql="SELECT * FROM movies";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if ($count > 0) {
	     echo "
			<table>
			  <tr>
			  	<th>Sr. No.</th>
			    <th>Title</th>
			    <th>Year of Release</th>
			    <th>Director</th>
			    <th>Producer(s)</th>
			    <th>Actor(s)</th>
			    <th>Studio</th>
			    <th>Rating</th>
			    <th>Length</th>
			    <th>Genre</th>
			  </tr>
	     ";
     	// output data of each row
	    while($row = mysql_fetch_assoc($result)) {
			echo "
			<tr>
			<td>" . $row["id"]. "</td>
			<td>" . $row["title"]. "</td>
			<td>" . $row["year"]. "</td>
			<td>" . $row["director"]. "</td>
			<td>" . $row["producers"]. "</td>
			<td>" . $row["actors"]. "</td>
			<td>" . $row["studio"]. "</td>
			<td>" . $row["rating"]. "</td>
			<td>" . $row["length"]. "</td>
			<td>" . $row["genre"]. "</td>";
			if ($manager) {
				echo "
				<td>" . '<a href="edit_movie.php?id='.$row["id"].'">Edit</a>'. "</td>
				<td>" . '<a href="deletemovie.php?id='.$row["id"].'">Delete</a>'. "</td>";
			}

			echo "</tr>";
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}
?>
</body>
</html>