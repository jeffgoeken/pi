<?php

//connect to database
include './dbcreds.php';

$query=$_GET['query'];
$crone = "";
if($conn->query($query)===TRUE){
echo '<br>Record Successfully Changed.<br>';
}

$query = "SELECT * FROM cron";
$results = $conn->query($query);
if($results->num_rows > 0){
echo '<table class="table table-striped table-condensed">';
while($row=$results->fetch_assoc()){
echo "<tr><td>" . $row["time"] . "</td><td>" . $row["command"] . "</td></tr>";
$crone .= $row['time'] . ' ' . $row['command'] . PHP_EOL;
}// end of while
$output=shell_exec('crontab -e');
file_put_contents('/tmp/crontab.txt',$output . $crone);
echo exec('crontab /tmp/crontab.txt');
} //end if results
