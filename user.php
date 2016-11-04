<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style type="text/css">
 
    </style>
        <link rel="stylesheet" href="css/bootstrap.css">
		
	<script type='text/javascript'>
function validateForm() { 
    var x = document.forms["myForm"]["user"].value;
	var y = document.forms["myForm"]["email"].value;
	var z1 = document.forms["myForm"]["pass1"].value;
	var z2 = document.forms["myForm"]["pass2"].value;
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}/i;
     if (x == null || x == "") {
				document.getElementById("e_user").innerHTML="Please enter user name";
				xd = document.getElementById("e_user");
				xd.style.display = "";
			
		  return false;
     }
	 else {
				document.getElementById("e_user").innerHTML="";
				xd.style.display = "none";
	 }
	 if (y == '' || !re.test(y))
{
				document.getElementById("e_email").innerHTML="Please enter a valid email address"
				yd = document.getElementById("e_email");
				yd.style.display = ""
		  return false;
}
	 else {
				document.getElementById("e_email").innerHTML="";
				yd.style.display = "none";
	 }
     if (z1 == null || z1 == "") {
		 		 document.getElementById("e_pass1").innerHTML="Please enter your password";
				 z1d = document.getElementById("e_pass1");
				 z1d.style.display = ""
          return false;
     }
	 else {
				document.getElementById("e_pass1").innerHTML="";
				z1d.style.display = "none";
	 }
     if (z2 == null || z2 == "") {
		 		 document.getElementById("e_pass2").innerHTML="Please repeat password ";
				 z2d = document.getElementById("e_pass2");
				 z2d.style.display = ""
          return false;
     }	 
	 if (z1 != z2) {
		         document.getElementById("e_pass2").innerHTML="Passwords do not match";
				 z2d = document.getElementById("e_pass2");
				 z2d.style.display = ""
		  return false;
	 }
	 else {
				 document.getElementById("e_pass2").innerHTML="";
				 z2d.style.display = "none";
	 }
	      return false ; 
	 }
	

	
//Regular expression javascript for email validation





</script>	
</head>
<body>
<? include 'nav_header.php' ; ?>
<div class="container"> 
<div class="row">
    <h2> user registration : </h2>
	

	
    <form id="myForm"  name=	'myForm' class="form-inline" role="form" action="action/user_add.php" method="post" 
	onsubmit = "return validateForm()">
	 
     <div class="col-xs-12 col-md-6 form-group">
	 
    <h2> user registration : </h2>
 
    <p>
    MY User Name :       <input id="user" class="form-control  input-lg" name="user" type="text"  /> 
	<span id="e_user" class="alert alert-danger" role="alert" style="display:none">&nbsp;</span></p>
    <p>
    email :       <input id="email" class="form-control  input-lg" name="email" type="text"  />
	<span id="e_email" class="alert alert-danger" role="alert" style="display:none">
	</span></p>
    <p>
    Password:    <input id="pass1" class="form-control  input-lg" name="pass1" type="text"  />
	<span id="e_pass1" class="alert alert-danger" role="alert" style="display:none">
	</span></p>
    Repeat Password:    <input id="pass2" class="form-control  input-lg" name="pass2" type="text"  />
	<span id="e_pass2" class="alert alert-danger" role="alert" style="display:none">
	</span></p>
    <p>
	<input type="reset" /> <input type="submit" value="registration"/>
    </form>

</div>    
</div>

    <footer>
        <hr>
        <p>&copy;2015 - 6211003 Canada Inc . Ottawa . Canada</p>
    </footer>     
 

</body>
</html>
