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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#year").change(function(){
                 var year = $("#year").val()-1;
                 $.ajax({
                    type:"get",
                    url:"getlastyearmovies.php",
                    data:"year="+year,
                    success: function(data) {
                    	$("#mid").html(data);
                    	console.log(data);
                    }
                 });
            });
       });
    </script>
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
		<label>Movie Title
			<select name="mid" id="mid">
				<option value="null">Select a movie</option>
			</select>
		</label>
		<input name="type" value="movie" type="hidden">
		<input type="submit">
	</form>
</body>
</html>