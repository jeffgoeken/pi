<?php


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


//Show Tables

if($result = $conn->query("SHOW TABLES")){
$count = $result->num_rows;
$content = '<table class="table table-condensed table-hover"><tr><th>Plan Name</th><th colspan="2">Options</th><th></th></tr>';
while($row=$result->fetch_array()){
//echo $row[0] .'<br>';
$content .= '<tr><td>' . $row[0] .'</td>';
$content .= '<td> <a id="'.$row[0].'" onclick="editdb(this.id)">View/Edit</a> </td>';
$content .= '<td> <a id="'.$row[0].'" onclick="dropDB(this.id)">Delete</a> </td></tr>';
}
$content .= '</table>';
echo $content;

}

//$conn->query("SHOW TABLES");
