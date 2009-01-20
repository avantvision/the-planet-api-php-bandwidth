<?php 

ini_set('soap.wsdl_cache_enabled', false);  

$wsdl_url = 'https://api.theplanet.com/Svc/HardwareHardwareService.svc?WSDL'; 

include "config.php";

$hw_hw_svc = new SoapClient($wsdl_url, $paramsurl); 

$server = $hw_hw_svc->GetHardwarebyIPAddress(new SoapParam($ipaddress, 'IPAddress')); 

echo($server->Label . " [" . $server->HardwareType . "]\n"); 
echo($server->IPAddress . " [" . $server->HardwareID . "]\n"); 



?>

