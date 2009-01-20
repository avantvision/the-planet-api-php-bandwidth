<?php 

ini_set('soap.wsdl_cache_enabled', false);  

$gb_url = 'https://api.theplanet.com/Svc/HardwareBandwidthService.svc?WSDL'; 

include("config.php");
        
$params= array( 
        "HardwareID" => $hwid,
        "StartDate" => date('Y-m-01'),
        "EndDate" => date("Y-m-d")
       ); 

$hw_bw_svc = new SoapClient($gb_url, $paramsurl); 

$bwbyrange = $hw_bw_svc->GetBandwidthTotalByRange(new SoapParam($params,"params")); 

$bwthismonth = ($bwbyrange->ActualUsage);
$bwallowed = ($bwbyrange->AllowedUsage);
$bwimg = ($bwbyrange->Image);


header('Content-type: image/png');

echo $bwimg;





?>
