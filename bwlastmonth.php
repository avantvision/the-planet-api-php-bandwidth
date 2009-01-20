<?php 

ini_set('soap.wsdl_cache_enabled', false);  

$gb_url = 'https://api.theplanet.com/Svc/HardwareBandwidthService.svc?WSDL'; 

include("config.php");
        
$params= array( 
        "HardwareID" => $hwid,
        "MonthDate" => date('Y-m-d',strtotime("-30 days")),
               ); 

$hw_bw_svc = new SoapClient($gb_url, $paramsurl); 

$bwbyrange = $hw_bw_svc->GetBandwidthByMonth(new SoapParam($params,"params")); 

$bwlastmonth = ($bwbyrange->ActualUsage);
$bwallowed = ($bwbyrange->AllowedUsage);

echo '<p>';
echo 'Bandwidth last month:&nbsp;'; 
echo round($bwlastmonth/1000000000,3);
echo 'GB';
echo '</p>';

echo '<p>';
echo 'Period:&nbsp;'; 
echo date('F',strtotime("-30 days"));


echo '<p>';
echo '<img src="imagebymonth.php">';
echo '</p>';
?>
