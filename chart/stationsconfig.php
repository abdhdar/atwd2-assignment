<?php
date_default_timezone_set("GMT");
# This is config file to be initialized for line chart
ini_set('memory_limit', '512M');
# init for the page to load
$date = "01/01/15";
$stationId = 447;
$stat_Name = "Bath Road";
$UDate = strtotime($date);
$ChoosenDate = date("d/m/y", $UDate);

#switch operation in which city that can be choose
if(isset($_GET["stat_name"])){
  $stat_Name = $_GET['stat_name'];
  switch ($stat_Name) {
    case "Bath Road":
      $stationId = 447;
      break;
    case "Cheltenham Road \ Station Road":
      $stationId = 459;
      break;
    case "Fishponds Road":
      $stationId = 463;
      break;
    case "Newfoundland Road Police Station":
      $stationId = 375;
      break;
    case "Temple Way":
      $stationId = 500;
      break;
    case "Colston Avenue":
      $stationId = 501;
      break;
  }
}

#Provide stations for drop down list
$stationsArray = array(
  'Bath Road', 'Cheltenham Road \ Station Road', 'Fishponds Road',
  'Newfoundland Road Police Station', 'Temple Way', 'Colston Avenue'
);

#Use get to get the user input
if (isset($_GET['date'])) {
  $date = $_GET['date'];
}

#load data based on user input
$xml = simplexml_load_file("./data-" . $stationId . ".xml");

#Starting date as the user choose
$Daystart = strtotime($date);
#Calculation for 1 day
$Dayend = $Daystart + 86400; 

#arrays for the data initialisation
$Dailytime = [];
$n0Val = [];
$n02Val = [];
$n0XVal = [];

foreach ($xml->children() as $rec) {
  $timestamp = (string)$rec->attributes()->ts;
   # Only show take results that are in the 24 hours period
   if (($timestamp > $Daystart) && ($timestamp < $Dayend)) {
    array_push($Dailytime, date('G', $timestamp));
    array_push($n0Val, (string)$rec->attributes()->n0);
    array_push($n02Val, (string)$rec->attributes()->n02);
    array_push($n0XVal, (string)$rec->attributes()->n0x);
    }
   
   }
   #sort the four arrays based on the ts value
   array_multisort($Dailytime, $n0XVal , $n0Val , $n02Val );

   



