<?php

require '../bo/user_bo.php' ;

class user_test {
    function test1() {
        $userbo = new user_bo() ;
        if (  $userbo -> is_valid_new_user('abc' , 'a223' , 'a223' , 'test2@abc.ca' ) ) {
			print "user validation successful \n" ;
		}
		else {
			print_r ( $userbo->msgs ) ;
		}
		
    }
    
    function test2() {
        $userbo = new user_bo() ;
		$userbo->print_all();
        $u = $userbo->login('test2@abc.ca' , 'abc' ) ;
 
        print_r ( $u ) ;
    }
    
 
    function test3() {

        $userbo = new user_bo() ;
		$email ='test33@abc.ca' ;
		print "adding $email \n" ;
        $u = $userbo->db_add_user('abc', 'passx1',  $email ) ;
        if ( $u ) {
			$u = $userbo->get_user_by_email ( $email ) ;
			print_r ( $u ) ; 
		} else {
			print_r ( $userbo->db_error ) ; 
		}
		
    }

}

?>


<html>

<body>
<?php
$test = new user_test() ;
   
$test->test2() ; 



?>
</body>
</html>