<?php

class Login extends Controller {

    public function __construct(){
        parent:: __construct();
        $_SESSION['token'] = token;
    }

    public function index() {
        $data['token'] = $_SESSION['token'];
        $this->load->view('pages/login',$data);
    }

}
