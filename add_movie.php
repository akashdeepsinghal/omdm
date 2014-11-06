<?php
include 'session.php';
include 'connect.php';
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
	<form method="post" action="insertmovie.php">
		<input name="title" placeholder="Title" type="text" required>
		<input name="year" placeholder="Year of Release" type="text" required>
		<input name="director" placeholder="Director" type="text" required>
		<input name="producers" placeholder="Producers" type="text" required>
		<input name="actors" placeholder="Actors" type="text" required>
		<input name="studio" placeholder="Studio" type="text" required>
		<input name="rating" placeholder="Rating" type="Number" step="0.1" min="0.0" max="5.0" required>
		<input name="length" placeholder="Length in minutes" type="Number" required>
		<select name="genre">
		  <option value="humor">humor</option>
		  <option value="horror">horror</option>
		  <option value="action">action</option>
		  <option value="adventure">adventure</option>
		  <option value="romance">romance</option>
		  <option value="drama">drama</option>
		</select>
		<input type="submit">
	</form>
</body>
</html>