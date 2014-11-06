<?php
include 'session.php';
include 'connect.php';

$sql="SELECT * FROM theatres";
$result=mysql_query($sql);

while($row = mysql_fetch_assoc($result)) {
	$a[] = $row["tname"];
}
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
			<input name="tname" placeholder="Name of Theatre" type="text" id="theatrelist" onkeyup="showHint(this.value, '#theatrelist')" required>
			<input name="kk" placeholder="Name of movie" type="text" id="movielist" onkeyup="showHint(this.value, '#movielist')" required>
			<input name="startname" placeholder="startdate" type="date" required>
			<input name="endname" placeholder="enddate" type="date" required>
			<input name="actors" placeholder="Actors" type="text" required>
			<input name="premiumseatnumber" placeholder="Premium Seat Numbers" type="Number" required>
			<input name="premiumseatprice" placeholder="Premium Seat Price" type="Number" required>
			<input name="regularseatnumber" placeholder="Premium Seat Numbers" type="Number" required>
			<input name="regularseatprice" placeholder="Premium Seat Price" type="Number" required>
			<input name="rating" placeholder="Rating" type="Number" step="0.1" min="0.0" max="5.0" required>
			<input name="length" placeholder="Length in minutes" type="Number" required>
			<input name="showtime" placeholder="Show Time" type="time" required>
			<input type="submit">
		</form>
	</div>
</div>
<script>


function showHint(str,list) {
	// console.log('here');
	var url;
	if (list == '#movielist') {
		url = 'getmovies.php?q=';
	} else{
		url = 'gettheatres.php?q=';
	}
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    	var fields = xmlhttp.responseText.split(", ");
		var availableTags = [
		  "ActionScript",
		  "AppleScript",
		  "Asp",
		  "BASIC",
		  "C",
		  "C++",
		  "Clojure",
		  "COBOL",
		  "ColdFusion",
		  "Erlang",
		  "Fortran",
		  "Groovy",
		  "Haskell",
		  "Java",
		  "JavaScript",
		  "Lisp",
		  "Perl",
		  "PHP",
		  "Python",
		  "Ruby",
		  "Scala",
		  "Scheme"
		];
		$( list ).autocomplete({
			source: fields
		});
    }
  }
  xmlhttp.open("GET",url+str,true);
  xmlhttp.send();
}
</script>
</body>
</html>