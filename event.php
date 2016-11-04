<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style type="text/css">
 
    </style>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.calendars.js"></script>
	<script type="text/javascript" src="js/jquery.timepicker.js"></script>	
	<script type="text/javascript" src="js/jquery.calendars.plus.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.calendars.picker.css">
	<script type="text/javascript" src="js/jquery.plugin.js"></script>
	<script type="text/javascript" src="js/jquery.calendars.picker.js"></script>
	
<script>

function TrackDate() {

var EffectiveDate_start = $.trim($("[id$='event_start_date']").val());
var EffectiveDate_end = $.trim($("[id$='event_end_date']").val());
//var EffectiveTime_start = $.trim($("[id$='event_start_time']").val());
//var EffectiveTime_end = $.trim($("[id$='event_end_time']").val());


var Today = new Date();
var dd = Today.getDate();
var mm = Today.getMonth() + 1;
var yyyy = Today.getFullYear();
if (dd < 10) {
    dd = '0' + dd
}
if (mm < 10) {
    mm = '0' + mm
}
var day_start = EffectiveDate_start.substring(0, 2);
var month_start = EffectiveDate_start.substring(3, 5);
var year_start = EffectiveDate_start.substring(6, 10);
var Date_start = new Date(year_start,month_start-1,day_start);

var day_end = EffectiveDate_end.substring(0, 2);
var month_end = EffectiveDate_end.substring(3, 5);
var year_end = EffectiveDate_end.substring(6, 10);
var Date_end = new Date(year_end,month_end-1,day_end);
//var current_time = Today.getHours();

var x = document.getElementById("start_date");
var	y = document.getElementById("end_date");
if (EffectiveDate_start == null || EffectiveDate_start == "") {
    document.getElementById("start_date").innerHTML="Please select a date";
	x.style.display = "";
    return false;
}
else if (Date_start < Today) {
     document.getElementById("start_date").innerHTML="Start date not valid";
	 x.style.display = "";
     return false;
}
//else if (Date_start == Today && EffectiveTime_start < current_time){
//	document.getElementById("start_date").innerHTML="Please select a valid time";
//	x.style.display = "";
//  return false;
//}
else {
	document.getElementById("start_date").innerHTML="";
	x.style.display = "none";
}
if (EffectiveDate_end == null || EffectiveDate_end == "" ) {
    document.getElementById("end_date").innerHTML="Please select a date";
	y.style.display = "";
    return false;
}

else if (Date_end < Date_start) {
    document.getElementById("end_date").innerHTML="End date not valid";
	y.style.display = "";
    return false;
}
//else if (Date_end == Date_start && EffectiveTime_end < EffectiveTime_start){
//	document.getElementById("start_date").innerHTML="End time not valid";
//	y.style.display = "";
//    return false;
//}
else {
	document.getElementById("end_date").innerHTML="";
	y.style.display = "none";
}}
</script>



	<script type='text/javascript'>
function tttkDate() {
	alert ("123123");
	return false;
	
}

</script>
</head>
<body>
<?php include 'nav_header.php' ; ?>

<div class="container"> 
<div class="row">
    <h2> Event Creation : </h2>
    <form id="myForm"  name=	'myForm' class="form-inline" action="action/add_event.php" method="post" onsubmit=" return TrackDate()">
	 
     <div class="col-xs-12 col-md-6 form-group">
	 
    <h2> create event : </h2>
 
    <p>    Title :       <input id="title" class="form-control  input-lg" name="title" type="text"  /></p>

    <p>    Event Start Date :       <input id="event_start_date" name="event_start_date" class="form-control  input-lg" style="width:25%" type="text"  />
									<input id="event_start_time" name="event_start_time" class="form-control  input-lg" style="width:20%"  type="text"  />
									<span id="start_date" class="alert alert-danger" role="alert" style="display:none"></span></p>
 
    <p>    Event End Date 	:       <input id="event_end_date" name="event_end_date" class="form-control  input-lg" style="width:25%" type="text"  />
								    <input id="event_end_time" name="event_end_time" class="form-control  input-lg" style="width:20%" type="text"  />
									<span id="end_date" class="alert alert-danger" role="alert" style="display:none"></span></p>


	<input type="reset" value="clear form "/> 
	<input type="submit" value = "create event"/>
    </form>

</div>    
</div>

<script>  
$('#event_start_date,#defaultInline').calendarsPicker(); 
$('#event_end_date,#defaultInline').calendarsPicker();
$('#event_start_time,#defaultInline').timepicker();
$('#event_end_time,#defaultInline').timepicker();
</script>




    <footer>
        <hr>
        <p>&copy; . Ottawa . Canada</p>
    </footer>     


</body>
</html>