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
        return $this->db->select('transactions','*',['GROUP' => 'awb_number']);
    }

    public function GetTransactionsByAWBNumber($awb_number) {
        return $this->db->select('tracking','*',['awb_number' => $awb_number]);
    }

    public function CountAllTransactions() {
        return $this->db->count('transactions','*',["GROUP" => 'awb_number']);
    } 
    
    public function CountAllTransactionsById($accounts_id) {
        $query = $this->db->select('transactions','*', 
        [
        "GROUP" => 'awb_number',
        'shipper_id' => $accounts_id
        ]);
        return count($query);
    } 

    public function CountAllPackagesByAwbNumber($awb_number) {
        $query = $this->db->select('transactions','*', 
        [
        "GROUP" => 'awb_number',
        'awb_number' => $awb_number
        ]);
        return count($query);
    } 

    public function countDeliveredPackages($awb_number) {
        $query = $this->db->select('transactions','*',['awb_number' => $awb_number]);
        return count($query);
    }

    public function GetAllTransctionsShipperIdWithLimit($accounts_id) {
        return $this->db->select('transactions','*', 
            ["ORDER" => [
                "date_create" => "ASC"
            ],
            "LIMIT" => 10,
            "GROUP" => 'awb_number',
            'shipper_id' => $accounts_id
            ]
        );
    }

    public function GetAllTransctionsDriverId($accounts_id) {
        return $this->db->select('tracking','*',["GROUP" => 'awb_number','accounts_id' => $accounts_id]);
    }

    public function GetAllTransctionsCustomerId($accounts_id) {
        return $this->db->select('transactions','*',["GROUP" => 'awb_number','accounts_id' => $accounts_id,'transaction_status[!]' => 'Delivered']);
    }

    public function GetDeliveredTransactionByCustomerId($accounts_id) {
        return $this->db->select('transactions','*',["GROUP" => 'awb_number','accounts_id' => $accounts_id,'transaction_status' => 'Delivered']);
    }

    public function GetAllTransctionsByAwbNumber($awbNumber) {
        return $this->db->select('transactions','*', ['awb_number' => $awbNumber ]);
    }

    public function GetAllTransctionsShipperIdWithOutLimit($accounts_id) {
        return $this->db->select('transactions','*', 
            [
            "GROUP" => 'awb_number',
            'shipper_id' => $accounts_id
            ]
        );
    }

    public function updateTransactionStatusByAWBNumber($awbNumber) {
        $this->db->update('transactions',['transaction_status' => 'Delivered'],['awb_number' => decode($awbNumber)]);
        $this->db->insert('tracking',['accounts_id' => $_SESSION['accounts_id'],'awb_number' => decode($awbNumber),'message' => 'Your package has been delivered.']);
        redirect('/driver/dashboard/', 'AirWayBill # '.decode($awbNumber).' status changed to delivered.');
    }

    

    public function GetAllByTransactionsId($transactions_id) {
        return $this->db->select('transactions','*',['transactions_id' => $transactions_id]);
    }

    public function GetAllTransctions() {
        return $this->db->select('transactions','*', [
            "ORDER" => [
                "date_create" => "ASC",
            ],
            "LIMIT" => 10
        ]);

    }

    public function countDeliveredByAccounstId($accounts_id) {
        return $this->db->count('tracking','*',['accounts_id' => $accounts_id,'status' => 0]);
    }

    public function CreateOrUpdateAssignToDriver($data) {
        if($this->db->has('tracking','*',['awb_number' => $data['awb_number']])) {
            $this->db->update('tracking',$data,['awb_number' => $data['awb_number']]);
        } else {
            $this->db->insert('tracking',$data);
        }
        redirect('/courier/transactions/airwaybill/'.encode($data['awb_number']), 'AirWayBill # '.$data['awb_number'].' has been assigned to your driver.');
    }


    public function UpdateTransactions($data) {
        $path = $_SESSION['role'] == 'Admin' ? 'admin' : 'courier';
        $this->db->update('transactions',$data,['transactions_id' => $data['transactions_id']]);
        redirect($path.'/transactions/view/'.encode($data['transactions_id']),'Data has been changed.');
    }

}


