<?php
include 'session.php';
include 'connect.php';
$sql="SELECT * FROM movies";
$result=mysql_query($sql);

$type = $_GET["type"];
// echo $type;

while($row = mysql_fetch_assoc($result)) {
	$a[] = $row[$type];
  $b[] = $row['title'];
}

// lookup all hints from array if $q is different from "" 

$q = $_GET["q"];
$hint="";

if ($q !== "") {
  $q=strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name,0,$len))) {
      if ($hint==="") {
        $hint=$name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found
// or output the correct values 
// echo $hint==="" ? "no suggestion" : $hint;
$finalsql = "SELECT * FROM movies WHERE $type = '$hint'";
$finalresult=mysql_query($finalsql);
while($finalrow = mysql_fetch_assoc($finalresult)) {
  echo $finalrow['title'];
}
?>