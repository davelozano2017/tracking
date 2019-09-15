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

    public function GetAllByTransactionsId($transactions_id) {
        return $this->db->select('transactions','*',['transactions_id' => $transactions_id]);
    }


    public function UpdateTransactions($data) {
        $this->db->update('transactions',$data,['transactions_id' => $data['transactions_id']]);
        redirect('admin/transactions/view/'.encode($data['transactions_id']),'Data has been changed.');
    }

}


