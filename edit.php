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
$sql= 'DELETE * FROM ' . $planname;
if(!$conn->query($sql)=== TRUE){
echo 'Error deleting data: ' . $conn->error;
} else {
echo 'Table created successfully<br>';

//Enter data

$sql ='INSERT INTO ' . $planname . ' VALUES ' . $data;

if ($conn->query($sql) ===TRUE){
echo 'Data entered successfully';

} else {
echo '<h3 style="color:red">Data entry  error:</h3> Please enter a time.';

}
}
}
