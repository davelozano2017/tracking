<?php

class Admin extends Controller {

    public function __construct(){
        parent:: __construct();
        if(!isset($_SESSION['accounts_id'])) {
          redirect('login');
        }
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
      $data['city_municipality'] = $this->model->use('LocationsModel')->GetAllCityMunicipality();
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/admin/profile',$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function transactions($page) {
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/transactions/'.$page);
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }
    
    public function users($page) {
      $data['city_municipality'] = $this->model->use('LocationsModel')->GetAllCityMunicipality();
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
