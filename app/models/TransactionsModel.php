<?php 

class TransactionsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function CreateNewTransactions($data) {
        if($this->db->has('transactions',['awb_number' => $data['awb_number']])) {
            redirect('admin/transactions/create','Airwaybill Number already exist');
        } else {
            $this->db->insert('transactions',$data);
            redirect('admin/transactions/create','New Airwaybill has been added.');
        }
    }

    public function GetAll() {
        return $this->db->select('transactions','*');
    }

    public function GetAllTransactionsA() {
        return $this->db->select('transactions', [
            "[>]province" => ["destination_id"  => "province_id"],
        ],'*');
    }

}


