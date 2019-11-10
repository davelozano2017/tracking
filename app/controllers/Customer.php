<?php

class Customer extends Controller {

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
      $this->load->view('pages/customer/profile',$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function dashboard() {
      $data['countDelivered']    = $this->model->use('TransactionsModel')->countDeliveredByAccounstId($_SESSION['accounts_id']);
      $data['user'] = $this->model->use('AccountModel')->GetUserByid($_SESSION['accounts_id']);
      $queryAll                  = $this->model->use('TransactionsModel')->GetAllTransctionsCustomerId($_SESSION['accounts_id']);
      foreach($queryAll as $row) {
        $rows                      = $this->model->use('TransactionsModel')->GetAllTransctionsByAwbNumber($row['awb_number']);
        $data['countPackages']     = $this->model->use('TransactionsModel')->CountAllPackagesByAwbNumber($row['awb_number']);
        $data['countDelivered']     = $this->model->use('TransactionsModel')->countDeliveredPackages($row['awb_number']);
        $queryA                    = $this->model->use('AccountModel')->GetUserByid($rows[0]['accounts_id']);
        $queryB                    = $this->model->use('AccountModel')->GetUserByid($rows[0]['shipper_id']);
        $queryC                    = $this->model->use('LocationsModel')->GetAllProvincesById($rows[0]['origin_id']);
        $queryD                    = $this->model->use('LocationsModel')->GetAllProvincesById($rows[0]['destination_id']);
        $payMode                   = $this->model->use('PayModeModel')->GetListById($rows[0]['pay_mode_id']);
        $serviceMode               = $this->model->use('ServiceModeModel')->GetListById($rows[0]['service_mode_id']);
        $payModesId                = $payMode[0]['pay_mode_id'];
        $payModesName              = $payMode[0]['pay_mode_name'];
        $serviceModesId            = $serviceMode[0]['service_mode_id'];
        $serviceModesName          = $serviceMode[0]['service_mode_name'];
        $data['transactions'][]    = array(
          array(
            'transactions_id'      => $rows[0]['transactions_id'],
            'awbNumber'            => $rows[0]['awb_number'],
            'Address'              => $rows[0]['address'],
            'Quantity'             => $rows[0]['quantity'],
            'Description'          => $rows[0]['description'],
            'Cwt'                  => $rows[0]['cwt'],
            'Quantity'             => $rows[0]['quantity'],
            'transaction_status'   => $rows[0]['transaction_status'],
            'Amount'               => $rows[0]['amount'],
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
      $this->load->view('pages/customer/dashboard',$data);
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
      $this->load->view('pages/customer/drivers/'.$page,$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function logout() {
      unset($_SESSION['accounts_id']);
      redirect('login','You are logged out.');
    }

    public function transactions($page,$id = null) {
      $data['provinces']         = $this->model->use('LocationsModel')->GetAllProvinces();
      $data['user'] = $this->model->use('AccountModel')->GetUserByid($_SESSION['accounts_id']);
      $data['service_modes']     = $this->model->use('ServiceModeModel')->GetList();
      $data['pay_modes']         = $this->model->use('PayModeModel')->GetList();
      $data['countDelivered']    = $this->model->use('TransactionsModel')->countDeliveredByAccounstId($_SESSION['accounts_id']);
      if($id != null) {
        $queryAll                  = $this->model->use('TransactionsModel')->GetAllByTransactionsId(decode($id));
      } else {
        $queryAll                  = $this->model->use('TransactionsModel')->GetDeliveredTransactionByCustomerId($_SESSION['accounts_id']);
      }
      foreach($queryAll as $row) {
        $rows                      = $this->model->use('TransactionsModel')->GetAllTransctionsByAwbNumber($row['awb_number']);
        $data['countPackages']     = $this->model->use('TransactionsModel')->CountAllPackagesByAwbNumber($row['awb_number']);
        $data['countDelivered']     = $this->model->use('TransactionsModel')->countDeliveredPackages($row['awb_number']);
        $queryA                    = $this->model->use('AccountModel')->GetUserByid($rows[0]['accounts_id']);
        $queryB                    = $this->model->use('AccountModel')->GetUserByid($rows[0]['shipper_id']);
        $queryC                    = $this->model->use('LocationsModel')->GetAllProvincesById($rows[0]['origin_id']);
        $queryD                    = $this->model->use('LocationsModel')->GetAllProvincesById($rows[0]['destination_id']);
        $payMode                   = $this->model->use('PayModeModel')->GetListById($rows[0]['pay_mode_id']);
        $serviceMode               = $this->model->use('ServiceModeModel')->GetListById($rows[0]['service_mode_id']);
        $payModesId                = $payMode[0]['pay_mode_id'];
        $payModesName              = $payMode[0]['pay_mode_name'];
        $serviceModesId            = $serviceMode[0]['service_mode_id'];
        $serviceModesName          = $serviceMode[0]['service_mode_name'];
        $data['transactions'][]    = array(
          array(
            'transactions_id'      => $rows[0]['transactions_id'],
            'Recieved_By'          => $rows[0]['received_by'],
            'Transaction_Status'   => $rows[0]['transaction_status'],
            'awbNumber'            => $rows[0]['awb_number'],
            'Address'              => $rows[0]['address'],
            'Quantity'             => $rows[0]['quantity'],
            'Description'          => $rows[0]['description'],
            'Cwt'                  => $rows[0]['cwt'],
            'Quantity'             => $rows[0]['quantity'],
            'transaction_status'   => $rows[0]['transaction_status'],
            'Amount'               => $rows[0]['amount'],
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
      $this->load->view('pages/customer/transactions/'.$page,$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

}
