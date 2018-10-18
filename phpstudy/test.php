<?php
// PHP comment

/*
*  Another PHP comment
*/

require_once('Gps.php');
require_once('GpsChina.php');
require_once('Mobile.php');
require_once('Car.php');
$car = new Car();
$mobile = new Mobile();
$car->gps1();
echo "\n";
$mobile->gps1();
?>