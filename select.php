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
	        xmlhttp.open("POST", "./ajax_test.php", true);
	       xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded")
		 xmlhttp.send(eventN);
	// end validation check
	}//EOF results()


</script>
