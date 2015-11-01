<?php

//make the Database Connection

$conn = new mysqli('localhost','jeff','L@$v3g@$','sprinkler');
if($conn->connect_error){
 die('Connection error: ' . $conn->connect_error);
} 

$plans = array('Plan A', 'Plan B', 'Plan C', 'Plan D');
for($p=0;$p< count($plans);$p++){
echo '<fieldset><legend><h4>'. $plans[$p].'</h4></legend>';

//Show Tables
$content ='<table class ="table table-condensed"><tr>';
$content .='<th style="width"5em">Plan:</th>';
$content .= '<td colspan="10"><select class="form-control" style="width:10em;float-left;display:inline-block;">';
if($result = $conn->query("SHOW TABLES")){
$count = $result->num_rows;
while($row=$result->fetch_array()){
//echo $row[0] .'<br>';
$content .= '<option>' . $row[0] .'</option>';
}
$content .="</select></td><tr>";
$content .='</tr><th style="width:5em">Start Time</th> ';
$content .= '<td style="width:12em;"><select class="form-control" style="width:5em;float:left">';
for($i=0; $i<13; $i++){
$content .= '<option>' . $i . '</option>';
}
$content .='</select>';
$content .= '<select class="form-control" style="width:5em;"';
for($i=-1; $i<60; $i++){
if($i<10){
$content .='<option>0' . $i . '</option>';
} else {
$content .='<option>' . $i . '</option>';
}
}
$content .= '</select></td>';
$content .='<th style="width:5em">Set Days </th>
<td><input type="checkbox" value="0" name="' . $plans[$p] . '">Sun &nbsp
<input type="checkbox" value="1" name="' . $plans[$p] . '">Mon &nbsp
<input type="checkbox" value="2" name="' . $plans[$p] . '">Tue &nbsp
<input type="checkbox" value="3" name="' . $plans[$p] . '">Wed &nbsp
<input type="checkbox" value="4" name="' . $plans[$p] . '">Thu &nbsp
<input type="checkbox" value="5" name="' . $plans[$p] . '">Fri &nbsp
<input type="checkbox" value="6" name="' . $plans[$p] . '">Sat</td></tr>';
$content .='</tr><th style="width:5em">End Time</th> ';
$content .= '<td style="width:12em;"><select class="form-control" style="width:5em;float:left">';
for($i=0; $i<13; $i++){
$content .= '<option>' . $i . '</option>';
}
$content .='</select>';
$content .= '<select class="form-control" style="width:5em;"';
for($i=-1; $i<60; $i++){
if($i<10){
$content .='<option>0' . $i . '</option>';
} else {
$content .='<option>' . $i . '</option>';
}
}
$content .= '</select></td>';
$content .='<th style="width:5em">Set Days </th>
<td>Sun &nbsp<input type="checkbox" value="0" name="' . $plans[$p] . '">
Mon &nbsp<input type="checkbox" value="1" name="' . $plans[$p] . '">
Tue &nbsp<input type="checkbox" value="2" name="' . $plans[$p] . '">
Wed &nbsp<input type="checkbox" value="3" name="' . $plans[$p] . '">
Thu &nbsp<input type="checkbox" value="4" name="' . $plans[$p] . '">
Fri &nbsp<input type="checkbox" value="5" name="' . $plans[$p] . '">
Sat &nbsp<input type="checkbox" value="6" name="' . $plans[$p] . '"></td></tr>';

$content .= '</tr></table>';
}
echo $content;
echo '</fieldset>';
}

//$conn->query("SHOW TABLES");
