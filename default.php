<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
function listTables(){
var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
 document.getElementById("dynamic").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "./table.php", true);
  xhttp.send();
 } 

function dropDB(db){
var r = window.confirm("This action will delete the plan, do you wish to continue?")
if(r == true){
var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
 document.getElementById("alert").innerHTML = xhttp.responseText;
    }
   listTables()
  }
  xhttp.open("GET", "./options.php?name="+db, true);
  xhttp.send();
}
}
function editdb(db){
var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
 document.getElementById("alert").innerHTML = xhttp.responseText;
    }
   listTables()
  }
  xhttp.open("GET", "./show1.php?name="+db, true);
  xhttp.send();
}
function updatedb(){
var planname=document.getElementById('planname').innerHTML;
var e =0
var zone
var eventN ='planname=' + planname + '&data='
var eventTime= document.getElementsByName("time")	
	for( e; e<eventTime.length; e++){ //loop for number of events
var zone = document.getElementsByName("event"+e)
var	content= ""	
	for(var i=1;i<17;i++){
	content += (zone[i].checked)?1 + ",":0 +","

}

	content += eventTime[e].value
	eventN += '('  + content + '),'
}		
	eventN= eventN.substr(0,eventN.length-1);
	var xmlhttp = new XMLHttpRequest();
       	xmlhttp.onreadystatechange = function() {
       	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           document.getElementById("alert").innerHTML = xmlhttp.responseText;
   	 }	
  	}
	        xmlhttp.open("POST", "./edit.php", true);
	       xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded")
		 xmlhttp.send(eventN);

}

function clearuntime(){
var xhttp = new XMLHttpRequest;
   xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
 document.getElementById("selecttable").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "./cron.php", true);
  xhttp.send();
}
function selecttable(){
var xhttp = new XMLHttpRequest;
   xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
 document.getElementById("selecttable").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "./cron.php", true);
  xhttp.send();
}
function saveRuntime(planname){
alert(planname);
data = document.getElementsByName(planname);
alert(data.length)
<?php echo "test"; ?>
}
</script>
</head>
<body onload="listTables(); selecttable()" >
<div class="container">
<div>
<fieldset>
<legend><h1>Timer</h1></legend>
<input type="button" class="btn btn-success btn-lg" value="Create new plan"onclick="window.location.href='newplan.php'" />

<br></fieldset></br></br>
<fieldset><legend>Existing plans</legend>
<div id="alert"></div>
<div id="dynamic"></div>
</fieldset>
<div id="selecttable"></div>
</div>
</body>
</html>



