<?php 

ini_set('soap.wsdl_cache_enabled', false);  

$gb_url = 'https://api.theplanet.com/Svc/HardwareBandwidthService.svc?WSDL'; 

include("config.php");

$hw_bw_svc = new SoapClient($gb_url, $paramsurl); 

$bwdaily = $hw_bw_svc->GetBandwidth(new SoapParam($hwid, 'HardwareID')); 

$bwtoday = ($bwdaily->ActualUsage);
$bwallowed = ($bwdaily->AllowedUsage);
$bwimg = ($bwdaily->Image);


header('Content-type: image/png');

echo $bwimg;

?>

