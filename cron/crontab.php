<!DOCTYPE html>

<head>
<title>Edit CRON</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<style>
 .ib {display:inline-block;width:5em;}
</style>
<body>
<div class="container">
<form method="GET" action="./cronadd.php">
<div class="form-group">

<label>Job Name</label><input name="job" class="form-control" type="text"/>
</div>
<div class="form-group">
<label >Start Time</label><br><select  name="hour" class="form-control ib" >
<script type="text/javascript">
for(i=0;i<24;i++){
document.write('<option>' + i + '</option>')
}
</script>
</select>
<select name="minute" class="form-control ib">
<script type="text/javascript">
for(i=0;i<60;i++){
document.write('<option>' + i + '</option>')
}
</script>
</select>
</div>
<fieldset>
<div class="form-group">
 <label>Days</label>
  <div class="checkbox">

    <label><input name="day[]"  value="0" type="checkbox">Sun</label>
    <label><input name="day[]"  value="1" type="checkbox">Mon</label>
    <label><input name="day[]"  value="2" type="checkbox">Tue</label>
    <label><input name="day[]"  value="3" type="checkbox">Wed</label>
    <label><input name="day[]"  value="4" type="checkbox">Thu</label>
    <label><input name="day[]"  value="5" type="checkbox">Fri</label>
    <label><input name="day[]"  value="6" type="checkbox">Sat</label>
  </div>
<input type="submit" class="btn btn-success">
<input type=:button" class="btn btn-primary" onclick="window.close(window.open('cron.php'))">
</div>
</form>
</fieldset>
</body>


