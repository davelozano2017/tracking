<?php 

class PayModeModel extends Model {

    public function __construct() {
        parent::__construct();
    }

   public function GetList() {
    return $this->db->select('pay_mode','*');
  }

}


