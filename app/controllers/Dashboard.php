<?php

class Dashboard extends Controller {

    public function __construct(){
        parent:: __construct();
    }

    public function index() {
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/dashboard');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }

}