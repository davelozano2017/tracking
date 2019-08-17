<?php

class Welcome extends Controller {

    public function __construct(){
        parent:: __construct();
    }

    public function index() {
        $data['title'] = 'welcome';
        $this->load->view('pages/welcome',$data);
    }

}
