<?php
# timezone is set
@date_default_timezone_set("GMT");

# resource requirements is set
ini_set('memory_limit', '512M');
ini_set('max_execution_time', '120');
ini_set('auto_detect_line_endings', true);

#used to get the defined variables in config.php
require 'config.php'; 

# start the microtime
$timerstart = microtime(true);

#Defined sitename hash value are passed through from config.php
$siteId = array_keys(sitename);

foreach ($siteId as $ID => $sitename)
{
    #name of each file being ammended data-$ID.csv
    $s[$ID] = fopen('data-' . $siteId[$ID] . '.csv', 'a+');
    #fputs to add header and will eventually add the other bits of data
    fputs($s[$ID], $header);
}

if (file_exists('air-quality-data-2004-2019.csv'))
{ 
    # open the input CSV file
    $filedata = fopen("air-quality-data-2004-2019.csv", "r") or die("file failed to open");

    # ignores headers
    fgets($filedata, 500);

    while (($line = fgets($filedata, 500)) !== false)
    {
        $csvSplit = explode(";", $line);

        foreach ($siteId as $ID => $sitename)
        {
            # switch checks siteId array against sitename array_keys
            switch ($csvSplit[4])
            {
                case $siteId[$ID]:
                    $s2 = $s[$ID];
                break;
            }
        }

        # if CO2 or CO exist, write  
        if (!empty($csvSplit[1]) or !empty($csvSplit[11]))
        {
            $r = $csvSplit[4].','.strtotime($csvSplit[0]).','.$csvSplit[1].','.$csvSplit[2].','.
                 $csvSplit[3].','.$csvSplit[4].','.$csvSplit[5].','.$csvSplit[6].','.$csvSplit[7].','.
                 $csvSplit[8] . ',' . $csvSplit[9] . ',' . $csvSplit[10].','.$csvSplit[11].','.
                 $csvSplit[12].','.$csvSplit[17].','.$csvSplit[18]."\r\n";

            fwrite($s2, $r);
        }
        # else filter out the lines
        else
        {
            $filteredout++;
        }

        # count total lines processed
        $lineprocessed++;
    } 

} 
#error message when .csv file is not found
else{ echo " air-quality-data-2004-2019.csv does not exist! " ;} 
echo "</br>";   


# stop the microtime
$timerend = microtime(true);

# report
echo " Total of : " . $lineprocessed . ' lines have been processed <p\>' ;
echo "</br>";  
echo "Total of : ". $filteredout . " empty records filtered out ";
echo "</br>";  
echo "Time taken is : ". $timerend - $timerstart. " seconds ";
?>
