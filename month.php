<?php 

ini_set('soap.wsdl_cache_enabled', false);  

$gb_url = 'https://api.theplanet.com/Svc/HardwareBandwidthService.svc?WSDL'; 

include("config.php");
        
$params= array( 
        "HardwareID" => $hwid,
        "MonthDate" => date('Y-m-d'),
               );  

$hw_bw_svc = new SoapClient($gb_url, $paramsurl); 

$bwbyrange = $hw_bw_svc->GetBandwidthByMonth(new SoapParam($params,"params")); 


$bwthismonth = ($bwbyrange->ActualUsage);
$bwestimated = ($bwbyrange->EstimatedUsage);
$bwallowed = ($bwbyrange->AllowedUsage);

echo '<p>';
echo 'Bandwidth used this month:&nbsp;'; 
echo round($bwthismonth/1000000000,3);
echo 'GB';
echo '</p>';

echo '<p>';
echo 'Estimated bandwidth for this month:&nbsp;'; 
echo round($bwestimated/1000000000,3);
echo 'GB';
echo '</p>';


echo '<p>';
echo 'Period:&nbsp;'; 
echo date('Y-m-01');
echo '&nbsp;-&nbsp;'; 
echo date("Y-m-d");
echo '</p>';


echo '<p>';
echo '<img src="imagemonth.php">';
echo '</p>';
?>
