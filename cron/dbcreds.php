<?php

$host='localhost';
$user = 'jeff';
$passwd = 'L@$v3g@$';
$db='sprinkler';

//connect to database

$conn= new mysqli($host,$user,$passwd,$db);
if($conn->connect_error){
die('Connection Error: ' .$conn->connect_error);
} else {
echo 'Connection Successful';
}

