<?php
include 'session.php';
include 'connect.php';
// $sql="SELECT * FROM theatres";
// $result=mysql_query($sql);

// while($row = mysql_fetch_assoc($result)) {
// 	$a[] = $row["tname"];
// }

// // lookup all hints from array if $q is different from "" 

// $q = $_GET["q"];
// $hint="";

// if ($q !== "") {
//   $q=strtolower($q);
//   $len=strlen($q);
//   foreach($a as $name) {
//     if (stristr($q, substr($name,0,$len))) {
//       if ($hint==="") {
//         $hint=$name;
//       } else {
//         $hint .= ", $name";
//       }
//     }
//   }
// }

// // Output "no suggestion" if no hint was found
// // or output the correct values 
// echo $hint==="" ? "no suggestion" : $hint;


$mid = $_GET["mid"];
// echo "<select>";
$result = mysql_query("SELECT * FROM movies where id='$mid'");
while($rows = mysql_fetch_array($result)){
  $theatres = $rows['theatres'];
  $theatres_array = explode(", ", $theatres);
  for ($i=0; $i <sizeof($theatres_array) ; $i++) {
    $theatreresult = mysql_query("SELECT * FROM theatres where id='$theatres_array[$i]'");
    while ($trows = mysql_fetch_array($theatreresult)) {
      echo"<option value=".$theatres_array[$i].">".$trows['tname']."</option>";
    }
    
  }
}
// echo "</select>";
?>