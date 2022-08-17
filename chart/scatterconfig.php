<?php
# the function of scatterconfig.php is to use AJAX to grab xml file for Wells Road Station: 270, passing each months average reading for n0 as Json data
# attribution towards 
ini_set('memory_limit', '512M');

$reader = new XMLReader();

$var = array();
#get the file contents for data-215, choose other file for other location 
$xml = file_get_contents("data-215.xml");

$array = simplexml_load_string($xml);

$array = json_decode(json_encode($array) , true);

#creating variables for the sum and counter of each month
for($i = 1; $i <= 12; $i++) {
         ${"sum$i"} = 0;
         ${"counter$i"} = 0;
        }

$count = 0;

# using for loop to get each record in the xml file
for ($i = 0;$i < count($array['rec']);$i++)
{

    # refer to date by ts attribute
    $date = $array['rec'][$i]['@attributes']['ts'];
    # refer to n0 by n0 attribute
    $n0 = $array['rec'][$i]['@attributes']['n0'];

    $time = date('H', $date);
    $year = date('y', $date);
    $month = [];

    # filters results to those in 2017 & at 08:00 hours
    if ($year == '17' && $time == "08")
    {
        $count++;
        $month = date('m', $date);
    }

    
    #conditions are created for each month for finding the total of n0 and counter for number of readings
    for($j = 1; $j <= 12; $j++) {
      if ($month == $j){
          ${"sum$j"} += $n0;
          ${"counter$j"}++; }
            }

}

#average for each month =  sum of n0 readings per month/number of readings for the month

$AvgJan = $sum1 / $counter1;
$AvgFeb = $sum2 / $counter2;
$AvgMar = $sum3 / $counter3;
$AvgApr = $sum4 / $counter4;
$AvgMay = $sum5 / $counter5;
$AvgJun = $sum6 / $counter6;
$AvgJul = $sum7 / $counter7;
$AvgAug = $sum8 / $counter8;
$AvgSep = $sum9 / $counter9;
$AvgOct = $sum10 / $counter10;
$AvgNov = $sum11 / $counter11;
$AvgDec = $sum12 / $counter12;

# array is declared for output
$o = [];
$o += ['JanuaryAverage' => $AvgJan];
$o += ['FebruaryAverage' => $AvgFeb];
$o += ['MarchAverage' => $AvgMar];
$o += ['AprilAverage' => $AvgApr];
$o += ['MayAverage' => $AvgMay];
$o += ['JuneAverage' => $AvgJun];
$o += ['JulyAverage' => $AvgJul];
$o += ['AugustAverage' => $AvgAug];
$o += ['SeptemberAverage' => $AvgSep];
$o += ['OctoberAverage' => $AvgOct];
$o += ['NovemberAverage' => $AvgNov];
$o += ['DecemberAverage' => $AvgDec];

# returning as a JSON data
echo json_encode($o);

?>
