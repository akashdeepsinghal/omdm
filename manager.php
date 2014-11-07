<?php
include 'session.php';
include 'ifmanager.php';
?>
<html>
<body>
	Login Successful. Welcome 
	<?php 
	echo $fullname;
	if ($manager) {
		echo '<br>'.'<a href="manage_movies.php">Manage movies!</a>'.'<br>'
		.'<a href="add_show.php">Add Shows!</a>'.'<br>'
		.'<a href="add_theatres.php">Add Theatres!</a>';
	}
	?>
	<br>
	<a href="logout.php">Logout</a>
</body>
</html>