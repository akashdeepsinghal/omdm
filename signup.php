<?php
include 'connect.php';
$title = "Online Movie Database Management System";
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?> | Signup</title>
	<style type="text/css">
		input{
			display: block;
		}
	</style>
</head>
<body>
	<form method="post" action="register.php">
		<input name="fullname" placeholder="Full Name" type="text" required>
		<input name="address" placeholder="Address" type="text" required>
		<input name="phone" placeholder="Phone Number" type="text" required>
		<input name="username" placeholder="Username" type="text" required>
		<input name="password" placeholder="Password" type="password" required>
		<input name="repassword" placeholder="Re-enter Password" type="password" required>
		<input type="radio" name="role" value="manager">Manager
		<input type="radio" name="role" value="guest" checked>Guest
		<input type="submit">
	</form>
</body>
</html>