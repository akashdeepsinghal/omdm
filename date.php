<?php
// echo date("l");
// echo mktime(0, 0, 0, 0, date("d")+$i, 0);
// for($i=0; $i<=6; $i++){
// 	echo strtoupper(date("D d", mktime(0, 0, 0, 0, date("d")+$i, 0)));
// 	echo "\n";
// }
// echo date("Y-m-d");
$begin = new DateTime( '2010-05-01' );
$end = new DateTime( '2010-05-10' );

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);

foreach ( $period as $dt ){
	$r = $dt->format( "Y-m-d" );
	echo $r;
}
?>