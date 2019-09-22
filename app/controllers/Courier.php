<?php

class Courier extends Controller {

    public function __construct(){
        parent:: __construct();
        if(!isset($_SESSION['accounts_id'])) {
          redirect('login');
        }
        $_SESSION['token'] = token;
    }

    public function index() {
      $this->profile();
    }

    public function dashboard() {
      $data['couriers']          = $this->model->use('AccountModel')->CoutUserByRoles('Courier');
      $data['customers']         = $this->model->use('AccountModel')->CoutUserByRoles('Customer');
      $data['countTransactions'] = $this->model->use('TransactionsModel')->CountAllTransactions();
      $queryAll                  = $this->model->use('TransactionsModel')->GetAllTransctions();
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/courier/dashboard',$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function logout() {
      unset($_SESSION['accounts_id']);
      redirect('login','You are logged out.');
    }

}
