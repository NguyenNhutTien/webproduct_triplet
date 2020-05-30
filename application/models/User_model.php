<?php
class User_model extends My_Model {
   protected $table = 'user';
   function __construct(){
       
   }
   public function check_login($user=array()){       
       $option = array();
       $option['where'] = " email = '". $user['email'] . "' AND password =  '" . $user['password'] . "'";
       $result = $this->get_all_from($option);
       if (count($result) == 0) {
           return false;
       }
       return  $result;
   }
   
   public function checkUserIsExist($user=array()){
       $option = array();
       $option['where'] = "email = '". $user['email']."'" ;
       $result = $this->get_all_from($option);
       if (count($result) == 0) {
           return false; //khong co user nay
       }
       return  true;
   }
   
   public function emailValid($string)
   {
       if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string))
           return true;
       return false;
   } 
   
}
?>

