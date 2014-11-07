<?php
include 'session.php';
include 'connect.php';
include 'ifmanager.php';
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<title><?php echo $title?> | Best Direction</title>
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
	<form method="post" action="insertaward.php">
		<label>Year
			<select name="year" id="year">
			<?php
				for($i=0; $i<=84; $i++){
					$display_date = strtoupper(date("Y", mktime(0, 0, 0, 1, 1, date("Y")-$i)));
					echo '<option value="'.$display_date.'">'.$display_date.'</option>';
				}
			?>
			</select>
		</label>
		<label>Actor
			<input name="actor" id="actor" value="" />
		</label>
		<input name="type" value="actor" type="hidden">
		<input type="submit">
	</form>
</body>
</html>