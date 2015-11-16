<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
var query
function deljob(id){

 query = 'DELETE FROM cron WHERE id='+id;
ajax(query)
}
//AJAX
function ajax(query){
var cron = new XMLHttpRequest();
cron.onreadystatechange = function(){
 if(cron.readyState ==4 && cron.status == 200){
 document.getElementById('alert').innerHTML= cron.responseText; 
 }//endi readystate if
} //end onreadystatechane
cron.open("GET","./deletejob.php?query=" + query, true);
cron.send();
showjob()
}// end function deljob

function newjob(){
var time = document.getElementById("mhdmd").value
var job = document.getElementById("job").value
query='INSERT INTO cron VALUES(null,"' + time + '","' + job + '")'
ajax(query);
}
function showjob(){
var cron = new XMLHttpRequest();
cron.onreadystatechange=function(){
 if(cron.readyState ==4 && cron.status ==200){
 document.getElementById('show').innerHTML = cron.responseText;
}
}
cron.open("GET","./showcron.php",true);
cron.send()
}//end of Function
function populateTime(start, stop, id){
document.write("<option>*</option>");
 for(var i=start; i<stop;i++){
 document.write ("<option>" +i + "</option>");
 } 
}
</script>
</head>
<html>
<body onload="showjob()">

<fieldset><h2>Current Jobs</h2>
<div id="alert"></div>
<div id="show"></div>

<div class="form-group col-xs-4">
  <label for="mhdmd">M H D M DOW</label>
  <input type="text" id="mhdmd" class="form-control">	
</div>

<div class="form-group col-xs-6">
  <label for="dow">Job</label>
  <input type="text" id="job" class="form-control">
</div>

<input type="button" value="Add Job" class="btn btn-lg btn-success" onclick="newjob()">
<div id="newjob"></div>
</fieldset>
</body>
</html>
