<?php
//Config file is set up so that changes can be made easily

# header to be initialized where extract-to-csv will use
$header = 'siteId,ts,nox,no2,no,pm10,nvpm10,vpm10,nvpm2.5,pm2.5,vpm2.5,co,o3,so2,loc,lat,long' . "\r\n";

# sitename constant array for extract-to-csv 
$Ehash_config = define('sitename', array(
    188 => 'AURN Bristol Centre',
    203 => 'Brislington Depot',
    206 => 'Rupert Street',
    209 => 'IKEA M32',
    213 => 'Old Market',
    215 => 'Parson Street School',
    228 => 'Temple Meads Station',
    270 => 'Wells Road',
    271 => 'Trailer Portway P&R',
    375 => 'Newfoundland Road Police Station',
    395 => "Shiner's Garage",
    452 => 'AURN St Pauls',
    447 => 'Bath Road',
    459 => 'Cheltenham Road',
    463 => 'Fishponds Road',
    481 => 'Create Centre Roof',
    500 => 'Temple Way',
    501 => 'Colston Avenue'
));

# sitename2 constant array for normalise-to-xml.php
$Ehash_config = define('sitename2', array(
    188 => array('AURN Bristol Centre' => '51.4572041156,-2.58564914143'),
    203 => array('Brislington Depot' => '51.4417471802,-2.55995583224'),
    206 => array('Rupert Street' => '51.4554331987,-2.59626237324'),
    209 => array('IKEA M32' => '51.4752847609,-2.56207998299'),
    213 => array('Old Market' => '51.4560189999,-2.58348949026'),
    215 => array('Parson Street School' => '51.432675707,-2.60495665673'),
    228 => array('Temple Meads Station' => '51.4488837041,-2.58447776241'),
    270 => array('Wells Road' => '51.4278638883,-2.56374153315'),
    271 => array("Trailer Portway P&R" => '51.4899934596,-2.68877856929'),
    375 => array('Newfoundland Road Police Station' => '51.4606738207,-2.58225341824'),
    395 => array("Shiner's Garage" => '51.4577930324,-2.56271419977'),
    452 => array('AURN St Pauls' => '51.4628294172,-2.58454081635'),
    447 => array('Bath Road' => '51.4425372726,-2.57137536073'),
    459 => array('Cheltenham Road' => '51.4689385901,-2.5927241667'),
    463 => array('Fishponds Road' => '51.4780449714,-2.53523027459'),
    481 => array('Create Centre Roof' => 'N/A'),
    500 => array('Temple Way' => '51.4579497129,-2.58398909033'),
    501 => array('Colston Avenue' => '51.4552693825,-2.59664882861')
));

#line counter and error counter initialization
$lineprocessed = 0;
$filteredout = 0;




