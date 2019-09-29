<?php 

class CourierModel extends Model {

    public function __construct() {
        parent::__construct();
    }


    public function GetAllDriversByAccountId($data) {
       $query = $this->db->select('drivers','*',['accounts_id' => $data]);
       $data = array();
       foreach($query as $row) {
          $data[] = $this->db->select('accounts','*',['accounts_id' => $row['drivers_id']]);
       }
       return $data;
    }


}


