<?php 

class LocationsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

  public function GetAllProvinces() {
    return $this->db->select('province','*');
  }
  
  public function GetAllProvincesById($provinces_id) {
    return $this->db->select('province','*',['province_id'=>$provinces_id]);
  }

}


