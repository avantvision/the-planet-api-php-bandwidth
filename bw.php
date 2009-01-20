<?php
include ("navbar.php");
echo '<h2>Bandwidth for today:</h2>';
include ("today.php");
echo '<hr />';
echo '<h2>Last 7 days:</h2>';
include ("week.php");
echo '<hr />';
echo '<h2>This month:</h2>';
include ("month.php");
echo '<hr />';
echo '<h2>Last month bandwidth:</h2>';
include ("bwlastmonth.php");
?>