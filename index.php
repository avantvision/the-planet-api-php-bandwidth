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

$bwmonthdivided= ($bwthismonth/1000000000);
$bwmonthdividedrounded = round($bwmonthdivided, 2);

$bwestimateddivided= ($bwestimated/1000000000);
$bwestimateddividedrounded = round($bwestimateddivided, 2);

include ("navbar.php");
echo '<p>';
echo '<img src="imagemonth.php">';
echo '</p>';

echo '<hr />';
echo '<table width="100%" border="0">';
echo ' <tr bgcolor="#CCCCCC">';
echo '  <td width="84%">&nbsp;</td>';
echo '   <td width="16%" align="center"><div class="style1">Bandwidth</div></td>';
echo ' </tr>';
echo '  <tr>';
echo '    <td>Total bandwidth used this month:</td>';
echo '    <td align="center">';
echo $bwmonthdividedrounded;
echo '&nbsp;GB';
echo '</td>';
echo '  </tr>';
echo '  <tr bgcolor="#F0F3F9">';
echo '    <td>Estimated bandwidth for this month:</td>';
echo '    <td align="center">';
echo $bwestimateddividedrounded;

echo '&nbsp;GB';
echo '</td>';
echo ' </tr>';
echo ' <tr>';
echo '   <td>Allowed bandwidth for this month:</td>';
echo '   <td align="center">';
echo ($bwallowed/1000000000);
echo ' &nbsp;GB';
echo '</td>';
echo '  </tr>';
echo '</table>';
echo '<p>';
echo 'Period:&nbsp;'; 
echo date('Y-m-01');
echo '&nbsp;-&nbsp;'; 
echo date("Y-m-d");
echo '</p>';
echo '<hr />';


?>
