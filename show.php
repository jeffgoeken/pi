<?php
$table = $_GET['name'];
echo $table;
$conn = new mysqli('localhost','jeff','L@$v3g@$','sprinkler');
if($conn->connect_error){
 die('Connection error: ' . $conn->connect_error);
} else {
echo 'Connection Successful';
}


$sql = 'SELECT * FROM '. $table;
$result = $conn->query($sql);
echo '<br>' . $sql;
if($result->num_rows > 0){
$zone = "";
for($i =1; $i<17; $i++){
$zone .= '<th>zone' . $i . '</th>'  ;
}

$theader = '<table class="table table-condensed"><tr><th>Event</th>' . $zone . '</tr>';
echo $theader;

 $e= 1;
While($row = $result->fetch_assoc()){
echo '<tr><td>Event' . $e++ .'</td>';
for($i=0;$i<16;$i++){
if($row['zone' .$i] ==0){
echo '<td><input type="checkbox" "value="true" name="event' .$e.$i .'"></td>';
} else {
echo '<td><input type="checkbox" "value="true" checked ="true" name="event' .$e .'"></td>';

}
//echo '<td>' . $row['zone'.$i ] . '</td>';
}
echo '</tr>';
}

echo '</table>';
}

