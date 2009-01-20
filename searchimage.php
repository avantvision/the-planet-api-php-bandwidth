<?php 

ini_set('soap.wsdl_cache_enabled', false);  

$gb_url = 'https://api.theplanet.com/Svc/HardwareBandwidthService.svc?WSDL'; 

include("config.php");
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
        
$params= array( 
        "HardwareID" => $hwid,
        "StartDate" => $startdate,
        "EndDate" => $enddate
       ); 

$hw_bw_svc = new SoapClient($gb_url, $paramsurl); 

$bwbyrange = $hw_bw_svc->GetBandwidthTotalByRange(new SoapParam($params,"params")); 

$bwimage= ($bwbyrange->Image);


header('Content-type: image/png');

echo $bwimage;

?>

