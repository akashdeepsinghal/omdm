<?php
include 'connect.php';

$tid=$_POST['tid'];
$mid=$_POST['mid'];
$date=$_POST['date'];
$showtime=$_POST['showtime'];
$seattype=$_POST['seattype'];
$p1=$_POST['p1'];
$p2=$_POST['p2'];
$p3=$_POST['p3'];
$p4=$_POST['p4'];

$count = 1;
if ($p2 != '') {
	$count +=1;
}if ($p3 != '') {
	$count +=1;
}if ($p4 != '') {
	$count +=1;
}


$checksql = "SELECT * FROM shows WHERE tid='$tid' AND mid ='$mid' AND showtime ='$showtime' AND date = '$date'";
$checkresult=mysql_query($checksql);
$enough = false;
while($rows = mysql_fetch_array($checkresult)){
	$sid = $rows['sid'];
	if ($seattype == 'premium') {
		if ($count < $rows['premiumseatnumber']) {
			$enough = true;
			$updatedseats = $rows['premiumseatnumber']-$count;
			$amount = $count*$rows['premiumseatprice'];

			$updatesql = "UPDATE `shows` SET `premiumseatnumber`=$updatedseats WHERE sid=$sid";
			if (mysql_query($updatesql)) {
				$profitsql = "UPDATE `movies` SET profit= profit+$amount WHERE id=$mid";
				if (mysql_query($profitsql)) {
				    echo "Ticket booked! Please pay INR ".$amount;
				} else {
				    echo "Error: " . mysql_error($conn);
				}
			} else {
			    echo "Error: " . mysql_error($conn);
			}
		}
	} elseif ($seattype == 'regular') {
		if ($count < $rows['regularseatnumber']) {
			$enough = true;
			$updatedseats = $rows['regularseatnumber']-$count;
			$amount = $count*$rows['regularseatprice'];
			
			$updatesql = "UPDATE `shows` SET `regularseatnumber`=$updatedseats WHERE sid=$sid";
			if (mysql_query($updatesql)) {
				$profitsql = "UPDATE `movies` SET profit= profit+$amount WHERE id=$mid";
				if (mysql_query($profitsql)) {
				    echo "Ticket booked! Please pay INR ".$amount;
				} else {
				    echo "Error: " . mysql_error($conn);
				}
			} else {
			    echo "Error: " . mysql_error($conn);
			}
		}
	}
	if (!$enough) {
		echo "Show is housefull!";
	}
}
?>