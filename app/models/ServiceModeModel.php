<?php 

class ServiceModeModel extends Model {

    public function __construct() {
        parent::__construct();
    }

   public function GetList() {
    return $this->db->select('service_mode','*');
  }

}


