<?php
include 'session.php';
include 'connect.php';
include 'ifmanager.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?> | Add Theatre</title>
</head>
<body>
	<form method="post" action="inserttheatre.php">
		<input name="tname" placeholder="Theatre Name" type="text" required>
		<input type="submit">
	</form>
</body>
</html>