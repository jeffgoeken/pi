<?php

function selectTime(){
$droptime= '<select class="form-control" style="width:5em;float-left;;display:inline-block">';
for($i=1; $i<13; $i++){
$droptime .= '<option>' . $i . '</option>';
}
$droptime  .='</select>';
$content .= '<select class="form-control" style="width:5em;float-left;;display:inline-block">';
for($i=0; $i<61; $i++){
if($i<10){
$content .='<option>0' . $i . '</option>';
} else {
$content .='<option>' . $i . '</option>';
}
}
$content .= '</select>';
}

//Define functions
function dropDB($dw){
echo $dw;
//$query = "DROP " . db;
//if($result=$conn->query($query))
}
//make the Database Connection

$conn = new mysqli('localhost','jeff','L@$v3g@$','sprinkler');
if($conn->connect_error){
 die('Connection error: ' . $conn->connect_error);
} 

$plans = array('Plan A', 'Plan B', 'Plan C', 'Plan D');
for($p=0;$p< count($plans);$p++){
echo '<fieldset><legend>'. $plans[$p].'</legend>';

//Show Tables
$content ='<table><tr>';
$content .='<th>Plan:</th>';
$content .= '<td><select class="form-control" style="width:10em;float-left;display:inline-block;">';
if($result = $conn->query("SHOW TABLES")){
$count = $result->num_rows;
while($row=$result->fetch_array()){
//echo $row[0] .'<br>';
$content .= '<option>' . $row[0] .'</option>';
}
$content .="</select></td>";
$content .='<th>Start Time</th> ';
$content .= '<td><select class="form-control" style="width:5em;float-left"';
for($i=0; $i<13; $i++){
$content .= '<option>' . $i . '</option>';
}
$content .='</select></td>';
$content .= '<td><select class="form-control" style="width:5em;float-left;"';
for($i=-1; $i<60; $i++){
if($i<10){
$content .='<option>0' . $i . '</option>';
} else {
$content .='<option>' . $i . '</option>';
}
}
$content .= '</select></td>';
$content .='<th>End Time</th> ';
$content .= '<td><select class="form-control" style="width:5em;float-left;">';
for($i=1; $i<13; $i++){
$content .= '<option>' . $i . '</option>';
}
$content .='</select></td>';
$content .= '<td><select class="form-control" style="width:5em;float-left;">';
for($i=0; $i<60; $i++){
if($i<10){
$content .='<option>0' . $i . '</option>';
} else {
$content .='<option>' . $i . '</option>';
}
}
$content .= '</select></td></tr></table>';
}
echo $content;
echo '</fieldset>';
}

//$conn->query("SHOW TABLES");
