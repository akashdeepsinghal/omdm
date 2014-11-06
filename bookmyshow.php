<?php
include 'session.php';
include 'connect.php';
$showsql="SELECT * FROM shows";
$showresult=mysql_query($showsql);
$moviesql="SELECT * FROM movies WHERE theatres<>''";
$movieresult=mysql_query($moviesql);
$theatresql="SELECT * FROM theatres";
$theatreresult=mysql_query($theatresql);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?> | Add Movie</title>
	<style type="text/css">
		input, select{
			display: block;
			width: 10%;
			box-sizing : border-box;
		}
		option{
			text-transform: capitalize;
		}
	</style>
</head>
<body>
	<div>
		<form method="post" action="insertshow.php">
			<label>Movie Title
				<select name="mid">
					<?php
					// // $id = $_GET["id"];
					// $sql="SELECT * FROM movies WHERE theatres<>''";
					// $result=mysql_query($sql);
					while($row = mysql_fetch_assoc($movieresult)) {
						echo '<option value="'.$row["id"].'">'.$row["title"].'</option>';
						echo $row["theatres"];
					}
					?>
				</select>
			</label>
			<label>Theatre
				<select name="tid">
					<?php
					// $id = $_GET["id"];
					$sql="SELECT * FROM theatres";
					$result=mysql_query($sql);
					while($row = mysql_fetch_assoc($result)) {
						echo '<option value="'.$row["id"].'">'.$row["tname"].'</option>';
						// echo $row["title"];
					}
					?>
				</select>
			</label>
			<!-- <a href="add_theatre.php" target="_blank">Add a theatre</a><br> -->
			<label>Showtime
				<select name="showtime">
					<?php
					while($row = mysql_fetch_assoc($showresult)) {
						echo '<option value="'.$row["showtime"].'">'.$row["showtime"].'</option>';
					}
					?>
				</select>
			</label>
			<label>Showtime
				<select name="showtime">
					<?php
					while($row = mysql_fetch_assoc($showresult)) {
						echo '<option value="'.$row["showtime"].'">'.$row["showtime"].'</option>';
					}
					?>
				</select>
			</label>
			<label>
				<input name="premiumseatnumber" placeholder="Premium Seat Numbers" type="text" required>
			</label>
			<input type="submit">
		</form>
	</div>
</div>
</body>
</html>