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

    public function CountAllTransactions() {
        return $this->db->count('transactions','*');
    } 
    
    public function CountAllTransactionsById($accounts_id) {
        return $this->db->count('transactions','*', ['shipper_id' => $accounts_id]);
    } 

    public function GetAllTransctionsShipperIdWithLimit($accounts_id) {
        return $this->db->select('transactions','*', 
            ["ORDER" => [
                "date_create" => "ASC"
            ],
            "LIMIT" => 10,
            'shipper_id' => $accounts_id
            ]
        );
    }

    public function GetAllByTransactionsId($transactions_id) {
        return $this->db->select('transactions','*',['transactions_id' => $transactions_id]);
    }

    public function GetAllTransctions() {
        return $this->db->select('transactions','*', [
            "ORDER" => [
                "date_create" => "ASC"
            ],
            "LIMIT" => 10
        ]);

    }

    public function countDeliveredByAccounstId($accounts_id) {
        return $this->db->count('tracking','*',['accounts_id' => $accounts_id,'status' => 0]);
    }


    public function UpdateTransactions($data) {
        $this->db->update('transactions',$data,['transactions_id' => $data['transactions_id']]);
        redirect('admin/transactions/view/'.encode($data['transactions_id']),'Data has been changed.');
    }

}


