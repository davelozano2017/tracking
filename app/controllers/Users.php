<?php

class Users extends Controller {

    public function __construct(){
        parent:: __construct();
    }

    public function index() {
      $this->new();
    }


    public function new() {
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/users/create');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }

    public function all() {
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/users/all');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }
   

}
