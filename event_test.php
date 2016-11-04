<?php

require '../bo/event_bo.php' ;

class event_test {

    function test1() {
        $eventbo = new event_bo() ;
		print "adding event \n" ;
		$row = $eventbo ->db_add_event( 1, "Fishing Party at the river" ) ;
		if ( $row != 1 ) {
			print_r(  $eventbo->db_error ) ;
		}
    }
    
    function test2() {
         
        $eventbo = new event_bo() ;
        $e = $eventbo->get_event_by_id("dNV6" ) ;

        print_r ( $e ) ;


    }
    
	
    function test3() {

        $ev = new event_bo() ;
		$id = 3 ; 
		$title ='tmoreorro s after work nyr ' ;
		print "adding event  \n" ;
        $row = $ev->db_add_event ( $id, $title ) ;
		if ( $row == 1 ) {
			print "looks good " ;
		} else {
			print_r(  $eventbo->db_error ) ;
		}
		
    }

}

?>


<html>

<body>
<?php
$test = new event_test() ;
//$test->test1 () ;    
$test->test3 () ;    
//$test->test3 () ;    
?>
</body>
</html>