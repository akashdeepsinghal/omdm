<?php
ob_start();
include 'connect.php';
// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 
$manager=$_POST['manager']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword = md5($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	// Register the session with $myusername, $mypassword and set certain session parameters"
	session_register("myusername");
	session_register("mypassword");
	$_SESSION["username"] = $myusername;
	$_SESSION["password"] = $mypassword;
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
    	$_SESSION["fullname"] = $row["fullname"];
    	$_SESSION["address"] = $row["address"];
    	$_SESSION["phone"] = $row["phone"];
    	$_SESSION["manager"] = $row["role"];
    }
	header("location:dashboard.php");
}
else {
	echo "Wrong Username or Password";
}
ob_end_flush();
?>