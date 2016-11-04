<?php 
require 'bo/event_bo.php' ;

session_start(); 
$user_id = 0 ; 

if (  isset ( $_SESSION["user_id"] ) )  { 
      $user_id = $_SESSION["user_id"] ;
      $eventbo = new event_bo() ; 
      $events = $eventbo->db_get_user_events($user_id) ; 
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style type="text/css">
 
    </style>
        <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/site.css">
<script type='text/javascript'>

</script>	
</head>
<body>
<?php include 'nav_header.php' ; ?>
<div class="container"> 
<div class = "row">
<h2> Welcome </h2>
<?  if (  isset ( $_SESSION["tt"]  ) )   
{ print $_SESSION["tt"] ;}   ?>  
 
<?  if (  isset ( $events ) )  :?>  

    <ul class='list-group'>   

    <?php foreach ($events as $row )  : 
        $title = $row["title"]  ;
		$from_date = $row["from_date"] ;
        $id = $row["event_id"] ;
    ?> 
       <li class='list-group-item'>
       <a href="event.php?id=<?=$id?>">  <?= $title . $from_date ?> </a>
       </li> 
    <?php endforeach; ?>
    </ul>

<?  endif; ?>  

<?php if ( $user_id == 0) : ?> 

<div class="col-xs-12 col-md-6 form-group">
    <form name=	'mylogin' class="form-inline" role="form" action="action/user_login.php" method="post" >
    <h2>Please login : </h2>

    email :       <input id="email" class="form-control  input-lg" name="email" type="text"  /></p>
    <p>
    Password:    <input id="pass1" class="form-control  input-lg" name="pass1" type="text"  /></p>
     <p>
	<input type="reset" value='clear form'/> 
    <input  type="submit" value='login' />
    </form>
</div>
    

<?php endif; ?>  
</div>
</div>

    <footer>
        <hr>
        <p>&copy;. Ottawa . Canada</p>
    </footer>     
 

</body>
</html>
