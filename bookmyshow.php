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
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#mid").change(function(){
                 var mid = $("#mid").val();
                 $.ajax({
                    type:"get",
                    url:"gettheatres.php",
                    data:"mid="+mid,
                    success: function(data) {
                    	$("#tid").html(data);
                    	console.log(data);
                    }
                 });
            });
       });
    </script>
</head>
<body>
	<div>
		<form method="post" action="insertshow.php">
			<label>Movie Title
				<select name="mid" id="mid">
					<option value="null">Select a movie</option>
					<?php
					$sql="SELECT * FROM movies";
					$result=mysql_query($sql);
					while($row = mysql_fetch_assoc($result)) {
						echo '<option value="'.$row["id"].'">'.$row["title"].'</option>';
					}
					?>
				</select>
			</label>
			<label>Theatre
				<select name="tid" id="tid">
					<option value="null">Select a movie first</option>
				</select>
			</label>
			<!-- <a href="add_theatre.php" target="_blank">Add a theatre</a><br> -->
			<label>Date
				<input name="date" type="date" />
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