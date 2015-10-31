#!/usr/bin/php -q
<?php

$planname = $_SERVER['argv'][1]."\n";
echo $planname;


$conn = new mysqli('localhost','jeff','L@$v3g@$','sprinkler');
if($conn->connect_error){
 die("Connection error: ".$conn->connect_error);
} else {
echo "Successful connection";
}
for($a=0;$a<2;$a){
$sql = "SELECT * FROM ".$planname;
$result= $conn->query($sql);

if($result->num_rows >0){
  while($row=$result->fetch_assoc()){
for($i = 0; $i < 16; $i++){
echo $row['zone'.$i];
}//end for
$etime=$row['time'];
sleep ($etime);
} //end of While
}//End If
}
$conn->close();
