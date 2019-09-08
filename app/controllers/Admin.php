<?php

class Admin extends Controller {

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
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/dashboard');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }


    public function profile() {
      $data['provinces'] = $this->model->use('LocationsModel')->GetAllProvinces();
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/admin/profile',$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function transactions($page) {
      $data['provinces'] = $this->model->use('LocationsModel')->GetAllProvinces();
      $data['couriers']          = $this->model->use('AccountModel')->GetUserByRoles('Courier');
      $data['customers']         = $this->model->use('AccountModel')->GetUserByRoles('Customer');
      $data['service_modes']     = $this->model->use('ServiceModeModel')->GetList();
      $data['pay_modes']         = $this->model->use('PayModeModel')->GetList();
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/admin/transactions/'.$page,$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }
    
    public function users($page) {
      $data['token'] = $_SESSION['token'];
      $data['provinces'] = $this->model->use('LocationsModel')->GetAllProvinces();
      if($page == 'all') {
        $data['users'] = $this->model->use('AccountModel')->GetUserByRoles('Customer');
      }
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/admin/users/'.$page,$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function reports() {
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/reports');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }

    public function settings() {
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/settings');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }

    public function logout() {
      unset($_SESSION['accounts_id']);
      redirect('login','You are logged out.');
    }

}
