<?php 

ini_set('soap.wsdl_cache_enabled', false);  

$gb_url = 'https://api.theplanet.com/Svc/HardwareBandwidthService.svc?WSDL'; 

include("config.php");

//first we process the single fields from the selector
$startyear = $_POST['yearselectex3'];
$startmonth = $_POST['monthselectex3'];
$startday = $_POST['dayselectex3'];
$endyear = $_POST['yearselectex4'];
$endmonth = $_POST['monthselectex4'];
$endday = $_POST['dayselectex4'];


//now we join them in Y-m-d
$startdate = $startyear.'-'.$startmonth.'-'.$startday;
$enddate = $endyear.'-'.$endmonth.'-'.$endday;

$params= array( 
        "HardwareID" => $hwid,
        "StartDate" => $startdate,
        "EndDate" => $enddate
       ); 

$hw_bw_svc = new SoapClient($gb_url, $paramsurl); 

$bwbyrange = $hw_bw_svc->GetBandwidthTotalByRange(new SoapParam($params,"params")); 

$bwusedthisrange = ($bwbyrange->ActualUsage);
$bwallowed = ($bwbyrange->AllowedUsage);
$bwimage= ($bwbyrange->Image);

include "navbar.php";
echo '<p>';
echo 'Bandwidth used for the period you search:&nbsp;'; 
echo round($bwusedthisrange/1000000,3);
echo 'MB';
echo '</p>';

echo '<p>';
echo 'Period:&nbsp;'; 
echo $startdate;
echo '&nbsp;-&nbsp;'; 
echo $enddate;
echo '</p>';

echo '<form id="form1" name="form1" method="post" action="searchimage.php" target="_blank">';
  echo ' <input type="hidden" name="startdate" id="startdate" value=" ';
  echo $startdate ;
 echo '" />';
  echo ' <input type="hidden" name="enddate" id="enddate" value="';
 echo $enddate ;
 echo '" />';
echo '   <input type="submit" value="Generate Graphic">';
 echo '  </form>';
?>
