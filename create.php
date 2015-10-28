<?php
$planname = $_POST['PlanName'];
$data = $_POST['data'];
//Create connection
$conn = new mysqli('localhost','jeff','L@$v3g@$','sprinkler');
if($conn->connect_error){
die("Connection Failed: " . $conn->conn_error); 
} else {
echo 'Connection Successful<br>';
}

//create table
$tblSetUp = "(";
for($i=0; $i<16; $i++){
$tblSetUp .= 'zone'.$i.' INT, ';
 }
$tblSetUp .= 'time INT)';

//create table
$sql = "CREATE TABLE sprinkler." .$planname . $tblSetUp;

if(!$conn->query($sql)=== TRUE){
echo 'Error creating table: ' . $conn->error;
} else {
echo 'Table created successfully<br>';

//Enter data

$sql ='INSERT INTO ' . $planname . ' VALUES ' . $data;

if ($conn->query($sql) ===TRUE){
echo 'Data entered successfully';

} else {
echo '<h3 style="color:red">Data entry  error:</h3> Please enter a time.';

$sql = "DROP TABLE ".$planname;
if($conn->query($sql) === True){
echo '<br>Table Deleted';
}
}
}
