<?php 

class LocationsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

   public function GetAllProvinces() {
    return $this->db->select('province','*');
  }

}


