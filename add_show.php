<?php
include 'session.php';
include 'connect.php';
include 'ifmanager.php';
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
					// $id = $_GET["id"];
					$sql="SELECT * FROM movies";
					$result=mysql_query($sql);
					while($row = mysql_fetch_assoc($result)) {
						echo '<option value="'.$row["id"].'">'.$row["title"].'</option>';
						// echo $row["title"];
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
			<label>Start Date
				<input name="startdate" id="startdate" placeholder="startdate" type="date" required>
			</label>
			<label>End Date
				<input name="enddate" id="enddate" placeholder="enddate" type="date" required>
			</label>
			<label>
				<input name="premiumseatnumber" placeholder="Premium Seat Numbers" type="Number" required>
			</label>
			<input name="premiumseatprice" placeholder="Premium Seat Price" type="Number" required>
			<input name="regularseatnumber" placeholder="Premium Seat Numbers" type="Number" required>
			<input name="regularseatprice" placeholder="Premium Seat Price" type="Number" required>
			<input name="length" placeholder="Length in minutes" type="Number" required>
			<label>Showtime
				<input name="showtime" placeholder="Show Time" type="time" required>
			</label>
			<input type="submit">
		</form>
	</div>
</div>
</body>
</html>