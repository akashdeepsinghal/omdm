<?php
// include 'session.php';
session_start();
if(!session_is_registered(myusername)){
	// header("location:login.php");
} else{
	$fullname = $_SESSION["fullname"];
	$address = $_SESSION["address"];
	$phone = $_SESSION["phone"];
	$manager = $_SESSION["manager"];
	$title = "Online Movie Database Management System";
	$name_array = explode(" ", $fullname);
	$firstname = $name_array[0];
}
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?> | Manage Movies</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	table{
		text-align: center;
	}
	</style>
</head>
<body>
	<div id="header-wrapper">
		<div class="header">
			<a href="index.php">
				<div class="logo">
					OMDM
				</div>
			</a>
			<a href="login.php">
				<div class="logo">
					<?php
					if ($firstname) {
						echo($firstname);
					} else {
						echo('Login');
					}
					?>
				</div>
			</a>
		</div>
	</div>
	<?php 
	if($manager){
		echo("<a href='add_movie.php'>Add a movie</a>");
	}
	?>
	
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
			<td>" . $row["genre"]. "</td>
			<td>" . '<a href="movie.php?id='.$row["id"].'">View</a>'. "</td>";


			if($manager){
				echo "
				<td>" . '<a href="editmovie.php?id='.$row["id"].'">Edit</a>'. "</td>
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