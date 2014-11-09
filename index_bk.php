<?php
// include 'session.php';
$title = "Online Movie Database Management System";
session_start();
if(!session_is_registered(myusername)){
	// header("location:login.php");
} else{
	$fullname = $_SESSION["fullname"];
	$address = $_SESSION["address"];
	$phone = $_SESSION["phone"];
	$manager = $_SESSION["manager"];
	$title = "Online Movie Database Management System";
	$name_array = explode(" ", $fullname);
	$firstname = $name_array[0];
}
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?> | Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<style type="text/css">
		input, select{
			display: block;
			width: 10%;
			box-sizing : border-box;
		}
		option{
			text-transform: capitalize;
		}
		table{
			text-align: center;
		}
	</style>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#querybox").change(function(){
                 var str = $("#querybox").val();
                 $.ajax({
                    type:"get",
                    url:"getmovies.php",
                    data:"q="+str,
                    success: function(data) {
                    	$("#result").html(data);
                    	console.log(data);
                    }
                 });
            });
       });
        // showHint
		function showHint(str) {
		  if (str.length==0) { 
		    document.getElementById("txtHint").innerHTML="";
		    return;
		  }
		  var xmlhttp=new XMLHttpRequest();
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","getmovies.php?q="+str,true);
		  xmlhttp.send();
		}
    </script>
</head>
<body>
	<div id="header-wrapper">
		<div class="header">
			<a href="index.php">
				<div class="logo">
					OMDM
				</div>
			</a>
			<a href="login.php">
				<div class="logo">
					<?php
					if ($firstname) {
						echo($firstname);
					} else {
						echo('Login');
					}
					?>
				</div>
			</a>
		</div>
	</div>
	<?php 
	if($manager){
		echo("<a href='manager.php'>Manager Section</a>");
	}
	?>
<!-- 			<div>
				<label>Search for a movie
					<input id="querybox"/>
					<span class="result" id="result"></span>
				</label>
				
			</div> -->
<p><b>Start typing a name in the input field below:</b></p>
<form> 
Movies: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Movies Suggestions: <span id="txtHint"></span></p>

<!-- Movies: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Movies Suggestions: <span id="txtHint"></span></p> -->
	
<?php 
	$sql="SELECT * FROM movies";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if ($count > 0) {
	     echo "
			<table>
			  <tr>
			  	<th>Sr. No.</th>
			    <th>Title</th>
			    <th>Year of Release</th>
			    <th>Director</th>
			    <th>Producer(s)</th>
			    <th>Actor(s)</th>
			    <th>Studio</th>
			    <th>Rating</th>
			    <th>Length</th>
			    <th>Genre</th>
			  </tr>
	     ";
     	// output data of each row
	    while($row = mysql_fetch_assoc($result)) {
			echo "
			<tr>
			<td>" . $row["id"]. "</td>
			<td>" . $row["title"]. "</td>
			<td>" . $row["year"]. "</td>
			<td>" . $row["director"]. "</td>
			<td>" . $row["producers"]. "</td>
			<td>" . $row["actors"]. "</td>
			<td>" . $row["studio"]. "</td>
			<td>" . $row["rating"]. "</td>
			<td>" . $row["length"]. "</td>
			<td>" . $row["genre"]. "</td>";


			if($manager){
				echo "
				<td>" . '<a href="edit_movie.php?id='.$row["id"].'">Edit</a>'. "</td>
				<td>" . '<a href="deletemovie.php?id='.$row["id"].'">Delete</a>'. "</td>";
			}
			echo "</tr>";
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}
?>
</body>
</html>