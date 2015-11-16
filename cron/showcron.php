<?php
//access cron table
require './dbcreds.php';


echo '<table class="table table-striped table-condensed">';
//Read dat from table
$query = "SELECT * FROM cron";
$result = $conn->query($query);
if($result->num_rows > 0){
  While($row = $result->fetch_assoc()){
  echo '<tr><td>' . $row["time"] . ' ' . $row["command"] .'</td><td><input type="button" 
class="btn btn-primary btn-xs" id="' . $row['id'] . '" value="Delete" onclick = "deljob(this.id)"></td></tr>';
}
echo '</table>';
}
echo '<table class="table table-condensed">';
