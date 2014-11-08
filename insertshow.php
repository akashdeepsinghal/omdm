<?php
include 'connect.php';

$tid=$_POST['tid'];
$mid=$_POST['mid'];
$showtime=$_POST['showtime'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$premiumseatnumber=$_POST['premiumseatnumber'];
$premiumseatprice=$_POST['premiumseatprice'];
$regularseatnumber=$_POST['regularseatnumber'];
$regularseatprice=$_POST['regularseatprice'];

$checksql = "SELECT * FROM shows WHERE tid='$tid' AND mid ='$mid' AND showtime ='$showtime'";
$checkresult=mysql_query($checksql);

// Mysql_num_row is counting table row
$checkcount=mysql_num_rows($checkresult);
if ($checkcount == 0) {

$begin = new DateTime( $startdate );
$end = new DateTime( $enddate );

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);

	$ok = true;
	foreach ( $period as $dt ){
		$date = $dt->format( "Y-m-d" );
		// echo($date);
		$showsql = "INSERT INTO shows (date, tid, mid, showtime, startdate, enddate, premiumseatnumber, premiumseatprice, regularseatnumber, regularseatprice) VALUES ('$date', '$tid', '$mid', '$showtime', '$startdate', '$enddate', '$premiumseatnumber', '$premiumseatprice', '$regularseatnumber', '$regularseatprice')";
		if (mysql_query($showsql)) {
			// echo "ok";
		} else {
			echo "Error: " . mysql_error($conn);
			$ok = false;
		}
	}

	if ($ok) {
	    
	    $moviesql = "SELECT theatres FROM movies WHERE id=$mid";
	    $movieresult = mysql_query($moviesql);
		while($row = mysql_fetch_assoc($movieresult)) {
			$tids = $row["theatres"];
			$found = false;
			if ($tids != '') {
				$theatre_array = explode(", ", $tids);
				for ($i=0; $i <sizeof($theatre_array) ; $i++) {
					if ($theatre_array[$i] == $tid) {
						$found = true;
					}
				}
				if (!$found) {
					$tids = $tids.", ".$tid;
				}
			} else{
				$tids = $tid;
			}
			if (!$found) {
				$updatesql = "UPDATE `movies` SET `theatres`='$tids' WHERE id=$mid";
				// mysql_query($updatesql);
				if (mysql_query($updatesql)) {
					echo "New record for shows created successfully";
				} else{
					echo "Error: " . mysql_error($conn);
				}
			}
		}
	} else {
	    // echo "Error: " . mysql_error($conn);
	    echo("Error!");
	}
} else{
	echo "Show already exists!";
}
?>