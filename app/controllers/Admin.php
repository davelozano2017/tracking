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
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/profile');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
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
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/users/'.$page);
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
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
