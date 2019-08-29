<?php 

class LocationsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

   public function GetAllCityMunicipality() {
    return $this->db->select('city_municipality','*');
  }

}


