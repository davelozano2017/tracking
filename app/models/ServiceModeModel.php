<?php 

class ServiceModeModel extends Model {

    public function __construct() {
        parent::__construct();
    }

  public function GetList() {
    return $this->db->select('service_mode','*');
  }

  public function GetListById($service_mode_id) {
    return $this->db->select('service_mode','*',['service_mode_id' => $service_mode_id]);
  }

}


