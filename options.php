<?php
$del = $_GET['name'];

//Create the connection
$conn = new mysqli('localhost','jeff','L@$v3g@$','sprinkler');
if($conn->connet_error){
 die("Connection failed" . $conn->connect_error);
} else {
echo 'Connection Successful';


//Create and run the query
$query= "DROP TABLE " . $del;
if($conn->query($query) ===true){
 echo '<br>Successfully Deleted plan ' . $del; 
}//End of create and run query


}//end of create connection else

