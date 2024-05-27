<?php
    
    class user_session {

        public function set_User($array){//set value to session
      
            
            $_SESSION['buyer1'] = array(
                "id"=>$array["buyer_id"], "fullname" => $array["first_name"]." ".$array["last_name"],
                "access"=> $array["access"]);
                
    
            return $_SESSION['buyer1'];
        }

        public function get_User(){//get the value of session
            if(!isset($_SESSION)){
                session_start();
            }
            return $_SESSION['buyer1'];
        }
    

    public function logout(){//log out delete the value of session
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['buyer1'] = null;
        unset($_SESSION['buyer1']);
        unset($_SESSION['redirect_url']);
    }
}
?>