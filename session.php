<?php
session_start();
$title = "Online Movie Database Management System";
if(!session_is_registered(myusername)){
	header("location:login.php");
} else{
	 $fullname = $_SESSION["fullname"];
	 $address = $_SESSION["address"];
	 $phone = $_SESSION["phone"];
	 $manager = $_SESSION["manager"];
}
?>