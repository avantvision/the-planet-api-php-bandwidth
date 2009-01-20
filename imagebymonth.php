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

$bwthismonth = ($bwbyrange->ActualUsage);
$bwallowed = ($bwbyrange->AllowedUsage);
$bwimage = ($bwbyrange->Image);

header('Content-type: image/png');

echo $bwimage;

?>

