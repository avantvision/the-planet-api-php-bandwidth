<?php 

ini_set('soap.wsdl_cache_enabled', false);  

$gb_url = 'https://api.theplanet.com/Svc/HardwareBandwidthService.svc?WSDL'; 

include("config.php");

$hw_bw_svc = new SoapClient($gb_url, $paramsurl); 

$bwdaily = $hw_bw_svc->GetBandwidth(new SoapParam($hwid, 'HardwareID')); 

$bwtoday = ($bwdaily->ActualUsage);
$bwallowed = ($bwdaily->AllowedUsage);

echo '<p>';
echo 'Allowed usage by month:&nbsp;'; 
echo round($bwallowed/1000000000, 3);
echo 'GB';
echo '</p>';

echo '<p>';
echo 'Bandwidth used today:&nbsp;'; 
echo round($bwtoday/1000000,3);
echo 'MB';
echo '</p>';


echo '<p>';
echo '<img src="imagetoday.php">';
echo '</p>';



?>

