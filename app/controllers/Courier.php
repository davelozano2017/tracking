<?php

class Courier extends Controller {

    public function __construct(){
        parent:: __construct();
        if(!isset($_SESSION['accounts_id'])) {
          redirect('login');
        }
        $_SESSION['token'] = token;
    }

    public function index() {
      $this->profile();
    }

    public function profile() {
      $data['provinces'] = $this->model->use('LocationsModel')->GetAllProvinces();
      $data['user'] = $this->model->use('AccountModel')->GetUserByid($_SESSION['accounts_id']);
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/courier/profile',$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function dashboard() {
      $data['countDrivers']      = $this->model->use('AccountModel')->countDriversByAccountsId($_SESSION['accounts_id']);
      $data['user'] = $this->model->use('AccountModel')->GetUserByid($_SESSION['accounts_id']);
      $data['countDelivered']    = $this->model->use('TransactionsModel')->countDeliveredByAccounstId($_SESSION['accounts_id']);
      $data['countTransactions'] = $this->model->use('TransactionsModel')->CountAllTransactionsById($_SESSION['accounts_id']);
      $queryAll                  = $this->model->use('TransactionsModel')->GetAllTransctionsShipperIdWithLimit($_SESSION['accounts_id']);
      foreach($queryAll as $row) {
        $queryA                    = $this->model->use('AccountModel')->GetUserByid($row['accounts_id']);
        $queryB                    = $this->model->use('AccountModel')->GetUserByid($row['shipper_id']);
        $queryC                    = $this->model->use('LocationsModel')->GetAllProvincesById($row['origin_id']);
        $queryD                    = $this->model->use('LocationsModel')->GetAllProvincesById($row['destination_id']);
        $payMode                 = $this->model->use('PayModeModel')->GetListById($row['pay_mode_id']);
        $serviceMode             = $this->model->use('ServiceModeModel')->GetListById($row['service_mode_id']);
        $payModesId              = $payMode[0]['pay_mode_id'];
        $payModesName            = $payMode[0]['pay_mode_name'];
        $serviceModesId          = $serviceMode[0]['service_mode_id'];
        $serviceModesName        = $serviceMode[0]['service_mode_name'];
        $data['transactions'][]    = array(
          array(
            'transactions_id'      => $row['transactions_id'],
            'awbNumber'            => $row['awb_number'],
            'Address'              => $row['address'],
            'Quantity'             => $row['quantity'],
            'Description'          => $row['description'],
            'Cwt'                  => $row['cwt'],
            'Quantity'             => $row['quantity'],
            'Amount'               => $row['amount'],
            'ConsigneeName'        => $queryA[0]['name'],
            'ConsigneeId'          => $queryA[0]['accounts_id'],
            'ShipperName'          => $queryB[0]['name'],
            'ShipperId'            => $queryB[0]['accounts_id'],
            'Origin'               => $queryC[0]['provDesc'],
            'OriginId'             => $queryC[0]['province_id'],
            'Destination'          => $queryD[0]['provDesc'],
            'DestinationId'        => $queryD[0]['province_id'],
            'PayModeId'            => $payModesId,
            'PayModeName'          => $payModesName,
            'ServiceModeId'        => $serviceModesId,
            'ServiceModeName'      => $serviceModesName,
          )
        );
      }
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/courier/dashboard',$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function drivers($page,$id = null) {
      $data['title']           = 'Drivers';
      $data['user'] = $this->model->use('AccountModel')->GetUserByid($_SESSION['accounts_id']);
      $data['id']              = decode($id);
      $data['ShowAllDrivers']  = $this->model->use('CourierModel')->GetAllDriversByAccountId($_SESSION['accounts_id']);
      $data['provinces']       = $this->model->use('LocationsModel')->GetAllProvinces();
      $accounts_id = decode($id);
      $data['getUsers'] = $this->model->use('AccountModel')->GetUserByid($accounts_id);
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/courier/drivers/'.$page,$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function logout() {
      unset($_SESSION['accounts_id']);
      redirect('login','You are logged out.');
    }

    public function transactions($page, $id = null) {
      $data['user'] = $this->model->use('AccountModel')->GetUserByid($_SESSION['accounts_id']);
      $data['provinces']           = $this->model->use('LocationsModel')->GetAllProvinces();
      $data['countDrivers']        = $this->model->use('AccountModel')->countDriversByAccountsId($_SESSION['accounts_id']);
      $getDriver                   = $this->model->use('AccountModel')->GetDriversByAccountsId($_SESSION['accounts_id']);
      foreach($getDriver as $driverRow) {
        $queryS                    = $this->model->use('AccountModel')->GetDriverByAccountsId($driverRow['drivers_id']);
        $data['AllDrivers'][]      = array(
          array(
            'accounts_id'      => $queryS[0]['accounts_id'],
            'name'             => $queryS[0]['name'],
          )
        );
      }
      $data['countDelivered']      = $this->model->use('TransactionsModel')->countDeliveredByAccounstId($_SESSION['accounts_id']);
      $data['countTransactions']   = $this->model->use('TransactionsModel')->CountAllTransactionsById($_SESSION['accounts_id']);
      if($id == null) {
        $queryAll                  = $this->model->use('TransactionsModel')->GetAllTransctionsShipperIdWithOutLimit($_SESSION['accounts_id']);
      } elseif($page == 'view') {
        $queryAll                  = $this->model->use('TransactionsModel')->GetAllByTransactionsId(decode($id));
      } else {
        $queryAll                  = $this->model->use('TransactionsModel')->GetAllTransctionsByAwbNumber(decode($id));
      }
      
      foreach($queryAll as $row) {
        $queryA                    = $this->model->use('AccountModel')->GetUserByid($row['accounts_id']);
        $queryB                    = $this->model->use('AccountModel')->GetUserByid($row['shipper_id']);
        $queryC                    = $this->model->use('LocationsModel')->GetAllProvincesById($row['origin_id']);
        $queryD                    = $this->model->use('LocationsModel')->GetAllProvincesById($row['destination_id']);
        $queryE                    = $this->model->use('TransactionsModel')->GetTransactionsByAWBNumber($row['awb_number']);
        @$queryF                   = $this->model->use('AccountModel')->GetDriverByAccountsId($queryE[0]['accounts_id']);
        $payMode                   = $this->model->use('PayModeModel')->GetListById($row['pay_mode_id']);
        $serviceMode               = $this->model->use('ServiceModeModel')->GetListById($row['service_mode_id']);
        $payModesId                = $payMode[0]['pay_mode_id'];
        $payModesName              = $payMode[0]['pay_mode_name'];
        $serviceModesId            = $serviceMode[0]['service_mode_id'];
        $serviceModesName          = $serviceMode[0]['service_mode_name'];
        $data['transactions'][]    = array(
          array(
            'transactions_id'      => $row['transactions_id'],
            'awbNumber'            => $row['awb_number'],
            'Address'              => $row['address'],
            'Quantity'             => $row['quantity'],
            'Description'          => $row['description'],
            'Cwt'                  => $row['cwt'],
            'Quantity'             => $row['quantity'],
            'Amount'               => $row['amount'],
            'ConsigneeName'        => $queryA[0]['name'],
            'ConsigneeId'          => $queryA[0]['accounts_id'],
            'ShipperName'          => $queryB[0]['name'],
            'ShipperId'            => $queryB[0]['accounts_id'],
            'Origin'               => $queryC[0]['provDesc'],
            'OriginId'             => $queryC[0]['province_id'],
            'Destination'          => $queryD[0]['provDesc'],
            'DestinationId'        => $queryD[0]['province_id'],
            'drivers_id'           => @$queryF[0]['accounts_id'],
            'drivers_name'         => @$queryF[0]['name'],
            'date'                 => @$queryE[0]['date'],
            'PayModeId'            => $payModesId,
            'PayModeName'          => $payModesName,
            'ServiceModeId'        => $serviceModesId,
            'ServiceModeName'      => $serviceModesName,
          )
        );
      }
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/courier/transactions/'.$page,$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

}
