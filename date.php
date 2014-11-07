<?php
// echo date("m");
// echo nl2br("\n");
// echo mktime(0, 0, 0, 0, date("d")+$i, 0);
// for($i=0; $i<=6; $i++){
// 	echo strtoupper(date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+$i, date("Y"))));
// 	echo "  ";
// }
// echo date("Y-m-d");



$startdate = '2010-05-01';
$begin = new DateTime( $startdate );
$end = new DateTime( '2010-05-10' );

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);
// echo($period);
// echo($interval);
foreach ( $period as $dt ){
	$r = $dt->format( "Y-m-d" );
	echo $r;
}
?>