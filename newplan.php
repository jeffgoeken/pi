<?php
$q = $_REQUEST["q"];
echo $q;
?>


<html>
<head>
 <title>New Plan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
<style>

</style>
</head>
<body>
<div class="container-fluid"> 
<fieldset><legend>New Plan Wizard</legend>
<form class="form-horizontal">
 <div class="form-group">
  <label for="planname" class="col-xs-3">Plan Name</label>
  <input type="text" id="planname" name="planname" class="col-xs-7" required>
   </div>
   <div class="form-group">
  <label for="numOfEvents" class="col-xs-3">Number of Events</label>
  <input type="text" id="numOfEvents" class="col-xs-2" />
 </div>
<input type="button" class="btn btn-success" value="Generate Table" onclick="generatePlan()">
<input type="button" class="btn btn-success" value="Home" onclick="window.close(window.open('default.php'))">
<div id="demo"></div>
</fieldset></form>
<fieldset><legend>Plan Settings</legend>
<form id="plansettings" action="newplan.php" method="post"></form>
</fieldset>

</div></body></html>



<script type="text/javascript">
var planname, numOfEvent
  function generatePlan(){
  planname= document.getElementById('planname').value;
  numOfEvent=document.getElementById('numOfEvents').value;
  var content ="<table class='table'><tr><th></th>"    
   for (var i=1;i < 17; i++){
    content += '<th>Zone' + i + '</th>'
  }//end of table header

  content += '<th>Time</th></tr>'
  for(var e=0; e<numOfEvent ;e++){
  content += '<tr><th>EVENT ' + (e+1) + '</th>'
   for (i=1;i<17;i++){
   content += '<td><input type="checkbox" value="true" class="checkbox" name="event' + e +'"/></td>';
   }//end checkbox loop
  content += '<td><input type="text" name="eventTime" style="width:2em;" /></td></tr>';
  }//End numOfEvents loop
 content +='</table><input type="button" class="btn btn-primary" value="submit" onclick="results()"/>'
document.getElementById("plansettings").innerHTML=content;

}  //end of generatePlan() 

	function ajaxtest(){
	var test="test"
	var somearray=["car","Truck","tractor"];
	alert(somearray);
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("demo").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST", "./ajax_test.php", true);
       xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded")
	 xmlhttp.send("q=" + somearray);
	}//EOF ajaxtest()

function results(){
 planname= document.getElementById('planname').value 
      planname = planname.toLowerCase();
  var illegalValue = 0  
  var eventN='PlanName='+planname.replace(/\s/g,'_') +'&data='
  var content = ""
  var zone
  var e =0
  var eventTime= document.getElementsByName("eventTime")	
	for( e; e<numOfEvent; e++){ //loop for number of events
	var zone = document.getElementsByName("event"+ e)
	content= ""	
	for(var i=0;i<16;i++){
	content += (zone[i].checked)?1 + ",":0 +","
		}
	content += eventTime[e].value	
	eventN += '('  + content + '),'
	}	
	eventN= eventN.substr(0,eventN.length-1);
	var xmlhttp = new XMLHttpRequest();
       	xmlhttp.onreadystatechange = function() {
       	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           document.getElementById("demo").innerHTML = xmlhttp.responseText;
   	 }	
  	}
	        xmlhttp.open("POST", "./create.php", true);
	       xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded")
		 xmlhttp.send(eventN);
	// end validation check
	}//EOF results()


</script>
