<?php
include 'session.php';
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
				<select name="tname">
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
				<select name="tname">
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
			<a href="add_theatre.php" target="_blank">Add a theatre</a><br>
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
			<input name="rating" placeholder="Rating" type="Number" step="0.1" min="0.0" max="5.0" required>
			<input name="length" placeholder="Length in minutes" type="Number" required>
			<label>Showtime
				<input name="showtime" placeholder="Show Time" type="time" required>
			</label>
			<input type="submit">
		</form>
	</div>
</div>

<script>
document.getElementById('datePicker').value = new Date().toDateInputValue();
</script>
</body>
</html>