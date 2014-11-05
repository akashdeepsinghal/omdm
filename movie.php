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
}
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
	<?php 
	if($manager){
		echo("<a href='add_movie.php'>Add a movie</a>");
	}
	?>
	
<?php
$id = $_GET["id"];
$sql="SELECT * FROM movies WHERE id=$id";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if ($count == 1) {
    while($row = mysql_fetch_assoc($result)) {
    	echo '<form method="post" action="updatemovie.php">';
		echo '
		<input name="id" value="'.$row["id"].'" type="hidden">
		<input class="readonly" name="title" placeholder="Title" value="' . $row["title"] . '" type="text" readonly>
		<input class="readonly" name="year" placeholder="Year of Release" value="' . $row["year"] . '" type="text" readonly>
		<input name="director" placeholder="Director" value="' . $row["director"] . '" type="text" required>
		<input name="producers" placeholder="Producers" value="' . $row["producers"] . '" type="text" required>
		<input name="actors" placeholder="Actors" value="' . $row["actors"] . '" type="text" required>
		<input name="studio" placeholder="Studio" value="' . $row["studio"] . '" type="text" required>
		<input name="rating" placeholder="Rating" value="' . $row["rating"] . '" type="Number" step="0.1" min="0.0" max="5.0" required>
		<input name="length" placeholder="Length in minutes" value="' . $row["length"] . '" type="Number" required>
		<select name="genre">
		  <option id="humor" value="humor">humor</option>
		  <option id="horror" value="horror">horror</option>
		  <option id="action" value="action">action</option>
		  <option id="adventure" value="adventure">adventure</option>
		  <option id="romance" value="romance">romance</option>
		  <option id="drama" value="drama">drama</option>
		</select>
		';
		echo '
	<script type="text/javascript">
		document.getElementById("'. $row["genre"] .'").selected = true;
	</script>
		';
		echo '
		<input type="submit">
		</form>
		';
    }
} else {
    echo "No such movie!!";
}
?>
</body>
</html>