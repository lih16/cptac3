<?php
//namespace Controller;

use Lib\model_base;

use Lib\Controller_base;

class controller_home extends  Controller_base{
 public $model;
 public function __construct() {  
     //$this->model = new Login_Model();
 } 
 
 public function action_browse(){
	 echo "asdf";
  
  
      include VIEW_PATH . 'header.php';
	  include VIEW_PATH . 'select.php';
	  include VIEW_PATH . 'narrative.php';
  
  
 }
 public function action_gettumor(){
	$this->model = new Tumor_Model();
	$result=$this->model->getTumor();
    $this->send_plaintext($result);   
  
  
}
public function action_getgenes(){
	$this->model = new Tumor_Model();
	$result=$this->model->getGenes();
    $this->send_plaintext($result);   
  
  
}
public function action_getgenemutations(){
	$this->model = new Tumor_Model();
	$result=$this->model->getGeneMutations();
    $this->send_plaintext($result);  
	
}
public function logout(){
    session_start();
    if(session_destroy()) // Destroying All Sessions
    {
      include include VIEW_PATH . 'login.php';
    }

 }
}

?>