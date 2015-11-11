<?php
$day =$_GET['day'];
$mnt = $_GET['minute'];
$hr = $_GET['hour'];
$job = $_GET['job'];
$entry = "";
$existing = explode("\n", shell_exec("crontab -l"));
echo '<table class="table table-condensed table-striped">';
foreach ($existing as $value){
echo '<tr><td>'. $value.'</td></tr>';
$entry .= $value.PHP_EOL; 
}
echo '</table>';
echo $entry."<br><br>";
$entry .= $mnt.' '.$hr.' * * ' .implode(",",$day). ' ' .$job ;
$output= shell_exec('crontab -e');
file_put_contents('/tmp/crontab.txt',$output.$entry.PHP_EOL);

echo exec('crontab /tmp/crontab.txt');
//echo exec('crontab -r');*/

