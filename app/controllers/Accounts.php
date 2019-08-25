<?php 

class Accounts extends Controller {

  public function __construct(){
    parent:: __construct();
    $this->token = $_SESSION['token'];
  }


  public function auth() {
    if($this->token == post('token')) {
         $data = array('email' => post('email'), 'password' => post('password'));
         $this->model->use('AccountModel')->secureLogin($data);
     } else {
         $this->load->view('errors');
     }
  }

}