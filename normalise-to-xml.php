<?php
# set timezone
@date_default_timezone_set("GMT");

# set resource requirements
ini_set('memory_limit', '512M');
ini_set('max_execution_time', '120');
ini_set('auto_detect_line_endings', true);

#used to get the defined variables in config.php
require 'config.php';

# start the microtime
$timerstart = microtime(true);

#Defined sitename hash value are passed through from config.php
$siteId = array_keys(sitename2);

foreach ($siteId as $ID => $val)
{
    $siteArray = array_keys(sitename2[$siteId[$ID]]);
    $site = sitename2[$siteId[$ID]];
    $Name = $siteArray[0];
    $latLong = ($site[$Name]);

    #opens each file using location constant array
    $fo[$ID] = fopen('data-' . $siteId[$ID] . '.csv', 'a+');

    $x = new XMLWriter();
    $x->openURI('data-' . $siteId[$ID] . '.xml');
    $x->startDocument("1.0", "UTF-8");
    $x->startElement('station');
    $x->writeAttribute('id', $siteId[$ID]);
    $x->writeAttribute('name', $Name);
    $x->writeAttribute('geocode', $latLong);

    # ignores headers
    fgets($fo[$ID], 500);
    while (($line = fgets($fo[$ID], 500)) !== false)
    {
        $csvSplit = explode(",", $line);

        if (empty($csvSplit[2]) && empty($csvSplit[3]) && empty($csvSplit[4]))
        {
          $filteredout++;
        }
        else
        {
          $x->startElement('rec');
          $x->writeAttribute('ts', $csvSplit[1]);
          $x->writeAttribute('n0x', $csvSplit[2]);
          $x->writeAttribute('n0', $csvSplit[4]);
          $x->writeAttribute('n02', $csvSplit[3]);
          $x->endElement();

           # count total lines processed
           $lineprocessed++;

        }
    }
    $x->endElement();
}
$x->endDocument();

# stop the microtime
$timerend = microtime(true);

# report
echo " Total of : " . $lineprocessed . ' lines have been processed <p\>' ;
echo "</br>";  
echo "Total of : ". $filteredout . " empty records filtered out ";
echo "</br>";  
echo "Time taken is : ". $timerend - $timerstart. " seconds ";
?>
