<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
function del(id){
alert(id);
}

function newjob(){

}


</script>
</head>
<html>
<body>

<fieldset><h2>Current Jobs</h2>

<?php
//access cron table
$conn = new mysqli('localhost','jeff','L@$v3g@$','sprinkler');

if ($conn->connect_error){
die("Connection error: " . $conn->connect_error);

} else {
echo "Connection Good <br>";
}
echo '<table class="table table-striped table-condensed">';
//Read dat from table
$query = "SELECT * FROM cron";
$result = $conn->query($query);
if($result->num_rows > 0){
  While($row = $result->fetch_assoc()){
  echo '<tr><td>' . $row["time"] . ' ' . $row["command"] .'</td><td><input type="button" 
class="btn btn-primary btn-xs" id="' . $row['id'] . '" value="Delete" onclick = "del(this.id)"></td></tr>';
}
echo '</table>';
}
$output = shell_exec('crontab -l');
//file_put_contents('/tmp/crontab.txt', $output.'*/5 * * * * /home/jeff/pi/runplan.php plan1'.PHP_EOL);
//echo $output;
echo '<table class="table table-condensed">';
$i=0;
$job= explode("\n",shell_exec('crontab -l'));
echo count($job) .'<br>';
foreach($job as $value){
echo $value . $i++.'<br>';
}
?>
<input type="button" class="btn btn-success" onclick="newjob()">
<div id="newjob"></div>
</fieldset>
</body>
</html>
