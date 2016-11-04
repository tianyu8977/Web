<?php 
require 'base_bo.php' ; 

class user_bo  extends base_bo 
{
    public function is_valid_new_user( $name, $pass1, $pass2, $email ) {
	
        $errors = array() ;
        if (  preg_match ( '/[^\w\d_]+/' , $name ) == 1 ) {
            $errors[] = 'Invalid user name ' . $name ;
        } 
        if ( preg_match ( '/[^\w\d_]+/' , $pass1 ) == 1 ) {
            $errors[] = 'Invalid password' ;
        }
        if ( preg_match ( '/[^\w\d_]+/' , $pass2 ) == 1 ) {
            $errors[] = 'Invalid repeat password' ;
        }
        if ( strcmp( $pass1, $pass2 ) !=0 ) {
            $errors[] = 'Password not match' ;
        }
        if ( preg_match ( '/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i' , $email ) == 0 ) {
            $errors[] = 'Invalid email address' ;
        } else {
            $u = $this->get_user_by_email ( $email ) ; 
            if ( ! empty ($u)  ) {
                $errors[] = $email . ' has been registered' ;
            }
        }
		if ( empty ( $errors ) ) {
			return true ;
		} else {
			$this->msgs = $errors ;
			return false ;
		}
    }
      
    function get_user_by_email( $email ) {
      $stmt = $this->db->prepare( "select * from t_user where email = ?   ");
      $stmt->bindParam(1, $email);
      $user = array() ; 
      if ( $stmt -> execute()  ) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
      }
      $db= null ;
      return $user ; 
    }
    
	public function db_add_user($name, $email ,$pass1 ) {
        
		$count = 0 ; 
        $stmt = $this->db->prepare( "insert into t_user (name ,  email , user_type , p_hash, u_date ) values (? , ? , 0, ? , datetime('now') )  ");
        if ( $stmt ) {
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $p_hash = hash ('sha256', $pass1) ;
            $stmt->bindParam(3,  $p_hash );
            $count = $stmt -> execute() ;
        } 
		if ( $count != 1 ) {
			$this->db_error[] = $this->db->errorInfo();
		}
		return $count ; 
    }
	public function print_all(   ) {
        

		$stmt = $this->db-> query ( "select * from t_user " ) ;
		$rs = $stmt->fetchAll() ;
		print_r ( $rs ) ; 
		

    }
	public function login( $email  , $pass1 ) {
        
		$user = null ; 
        $stmt = $this->db->prepare( "select user_id,  name, user_type  from t_user where email=? and p_hash= ?  ");
        $stmt->bindParam(1, $email);
		$p_hash =hash ('sha256', $pass1) ;
        $stmt->bindParam(2, $p_hash );
        if (  $stmt -> execute()  ) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
        } else {
			$this->db_error[]='unable to read' ;
			$this->db_error[] = $this->db->errorInfo();
		}
		return $user ; 
    }
    
}

