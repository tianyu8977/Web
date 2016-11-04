<?php 
require_once 'base_bo.php'  ;

class event_bo extends base_bo  
{
 
      
    function get_event_by_id( $event_id ) {
      
      $stmt = $this->db->prepare( "select * from t_event where event_id = ?   ");
      $stmt->bindParam(1, $event_id);
      $event = array() ; 
      if ( $stmt -> execute()  ) {
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
      }
      return $event ; 
    }

    private function next_event_id () {
        $id = "" ;
        $exists = TRUE ;
        do {
            $id = $this->next_id() ;
            $exists = $this->exist_id ( $id) ;
        }  while ( $exists  ) ; 
        return $id ; 
    }
 
    private function next_id () {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz" ;
        
        $id = "" ;
        for  ($i =0 ; $i <4 ; $i ++) {
            $r = rand( 0, 61) ;    
            $id = $id . substr($chars, $r, 1) ;
        }
        return $id ; 
    }

    private function exist_id ( $id ) {
        $stmt = $this->db->prepare("select 1 from t_event where event_id = ?") ;
        $stmt->execute( array( $id) ) ;
        $exists = FALSE ;
        if ( $stmt->fetch(PDO::FETCH_ASSOC) ) {
            $exists = TRUE ;
        }
        return $exists ; 
    }


	public function db_add_event($user_id, $title ) {
        
		$count = 0 ; 
        $next_id = $this->next_event_id () ;
        $stmt = $this->db->prepare( "insert into t_event (user_id ,   title , event_id, from_date, to_date, stat , create_date, update_date ) 
			values (? , ? , ?,  datetime('now'),datetime('now'), 0,  datetime('now'), datetime('now') )  ");
        if ( $stmt ) {
            $stmt->bindParam(1, $user_id);
            $stmt->bindParam(2, $title ) ;
            $stmt->bindParam(3, $next_id ) ;
            $count = $stmt -> execute() ;
        } 
		if ( $count != 1 ) {
			$this->db_error[] = $this->db->errorInfo();
		}  
		return $count ; 
    }
    function print_all () {
		 
		$stmt = $this->$db-> query ( "select *		from t_event " ) ;
		$rs = $stmt->fetchAll() ;
		print_r ( $rs ) ; 

	}
	public function db_get_user_events($user_id  ) {
        
		$count = 0 ; 
        $events = array() ; 
        $stmt = $this->db->prepare( "select user_id , event_id,  title , from_date from t_event where user_id = ?  ");
       
        if (  $stmt->execute( array ( $user_id)) ) {
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else  {
			$this->db_error[] = $this->db->errorInfo();
		}
		return $events ; 
    }

}

