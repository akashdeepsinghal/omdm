<?php
include 'session.php';
include 'connect.php';

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
            $("#date").change(function(){
                 var date = $("#date").val();
                 var mid = $("#mid").val();
                 var tid = $("#tid").val();
                 $.ajax({
                    type:"get",
                    url:"getshowtimes.php",
                    data:"date="+date+'&mid='+mid+'&tid='+tid,
                    success: function(data) {
                    	$("#showtime").html(data);
                    	console.log(data);
                    }
                 });
            });
       });
    </script>
</head>
<body>
	<div>
		<form method="post" action="confirmticket.php">
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
				<select name="date" id="date">
				<?php
					for($i=0; $i<=6; $i++){
						$display_date = strtoupper(date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+$i, date("Y"))));
						echo '<option value="'.$display_date.'">'.$display_date.'</option>';
					}
				?>
				</select>
			</label>
			<label>Showtime
				<select name="showtime" id="showtime" required>
					<option>Select a name first</option>
					?>
				</select>
			</label>
			<label>Seat
				<select name="seattype" required>
					<option value="premium">Premium</option>
					<option value="regular">Regular</option>
				</select>
			</label>
			<label>Person 1
				<input name="p1" placeholder="1st Person" type="text" required>
			</label>
			<label>Person 2
				<input name="p2" placeholder="2nd Person" type="text">
			</label>
			<label>Person 3
				<input name="p3" placeholder="3rd Person" type="text">
			</label>
			<label>Person 4
				<input name="p4" placeholder="4th Person" type="text">
			</label>

			<input type="submit">
		</form>
	</div>
</div>
</body>
</html>