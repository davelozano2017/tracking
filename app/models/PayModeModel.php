<?php 

class PayModeModel extends Model {

    public function __construct() {
        parent::__construct();
    }

  public function GetList() {
    return $this->db->select('pay_mode','*');
  }

  public function GetListById($pay_mode_id) {
    return $this->db->select('pay_mode','*',['pay_mode_id' => $pay_mode_id]);
  }

}


