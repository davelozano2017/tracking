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

  public function CreateNewUser() {
    $data = array(
      'province_id' => post('province_id'),
      'name'        => post('name'),
      'email'       => post('email'),
      'password'    => hashing(post('password')),
      'address'     => post('address'),
      'role'        => post('role'), 
      'status'      => 1,
      'date'        => post('date')
    );
    if(post('role') == 'Driver') {
      $driver = array(
        'accounts_id' => decode(post('accounts_id')),
      ); 
    } else {
      $driver = null;
    }
      $this->model->use('AccountModel')->CreateNewUser($data,$driver);
}


  public function UpdateUserById() {
    $data = array(
      'accounts_id' => decode(post('accounts_id')),
      'province_id' => decode(post('province_id')),
      'name'        => post('name'),
      'email'       => post('email'),
      'address'     => post('address'),
      'role'        => post('role'), 
      'status'      => post('status'), 
    );
    $this->model->use('AccountModel')->UpdateUserById($data);
}

}