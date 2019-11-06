<?php

require_once 'TimeTravel.php';

/*  Date variables declaration  */
$startDate = new DateTime("1985-12-31");
$endDate = new DateTime("2019-11-05");

/*  New Date Object  */
$timeTravel = new TimeTravel($startDate, $endDate);

echo "------------  Interval entre 2 dates  ------------";
echo "<br>";
echo $timeTravel->getTravelInfo();
echo "<br><br>";

echo "------------  1 milliard de secondes avant le 31 décembre 1985  ------------";
$pastTime = new DateInterval("PT1000000000S");
$pastDate = $timeTravel->findDate($pastTime);
echo "<br>";
echo "Doc est retourné dans le passé au : " . $pastDate . ".";
echo "<br><br>";

echo "------------  remonter au 31 décembre 1985 par saut de 1 mois 1 semaine 1 jour max ------------";
echo "<br>";
$docDate = new DateTime("1954-04-23");
//$backToFutureInterval = new DateInterval("P1M1W1D");
$backToFutureInterval = DateInterval::createFromDateString("1 month 1 week 1 day");
$backStep = new DatePeriod($docDate, $backToFutureInterval, $startDate);
$test =$timeTravel->backToFutureStepByStep($backStep);
echo implode($test, '<br>');
