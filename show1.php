
<html lang="en">
<head>
  <title>View-Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</head>


<body>


<?php
$table = $_GET['name'];
$conn = new mysqli('localhost','jeff','L@$v3g@$','sprinkler');
if($conn->connect_error){
 die('Connection error: ' . $conn->connect_error);
} else {
echo 'Connection Successful to <h3 id="planname">'.$table . '</h3>';
}


$sql = 'SELECT * FROM '. $table;
$result = $conn->query($sql);
if($result->num_rows > 0){
$zone = "";
for($i =1; $i<17; $i++){
$zone .= '<th>zone' . $i . '</th>'  ;
}

$theader = '<table class="table table-condensed"><tr><th>Event</th>' . $zone . '<th>Time</th></tr>';
echo $theader;

 $e= 0;
While($row = $result->fetch_assoc()){
echo '<tr name="event'.$e.'"><td>Event</td>';
for($i=0;$i<16;$i++){
if($row['zone' .$i] ==0){
echo '<td><input type="checkbox" "value="true" name="event' .$e .'"></td>';
} else {
echo '<td><input type="checkbox" "value="true" checked ="true" name="event' .$e .'"></td>';

}
}

echo '<td ><input type="text" name="time" style="width:2em" value="' . $row['time' ] . '"</td>';
echo '</tr>';
$e++;
}

echo '</table>';
}
?>

<input type="button" value="Save Plan" class="btn btn-primary" onclick="updatedb()">
<input type="button" value="Cancel" class="btn btn-primary" onclick="window.close(window.open('default.php'))">
</body>


