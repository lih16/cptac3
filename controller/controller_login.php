<?php
//namespace Controller;

use Lib\model_base;

use Lib\Controller_base;

class controller_login extends  Controller_base{
 public $model;
 public function __construct() {  
     $this->model = new Login_Model();
 } 
 
 public function action_login(){
  
 $reslt = $this->model->getlogin(); // it call the getlogin() function of model class and store the return value of this function into the reslt variable.
  if($reslt == 'login')
  {
     include VIEW_PATH . 'login.php';
  }
  else
  {
     include VIEW_PATH . 'login.php';
  }
  
 }
 public function logout()
 {
	
   session_start();
    if(session_destroy()) // Destroying All Sessions
   {
     include include VIEW_PATH . 'login.php';
    }

	 
 }
}

?>