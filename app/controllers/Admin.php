<?php

class Admin extends Controller {

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

    public function dashboard() {
      $data['couriers']          = $this->model->use('AccountModel')->CoutUserByRoles('Courier');
      $data['customers']         = $this->model->use('AccountModel')->CoutUserByRoles('Customer');
      $data['countTransactions']      = $this->model->use('TransactionsModel')->CountAllTransactions();
      $queryAll                  = $this->model->use('TransactionsModel')->GetAllTransctions();
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
      $this->load->view('pages/admin/dashboard',$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }


    public function profile() {
      $data['provinces'] = $this->model->use('LocationsModel')->GetAllProvinces();
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/admin/profile',$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function transactions($page,$id = null) {
      $data['provinces']         = $this->model->use('LocationsModel')->GetAllProvinces();
      $data['couriers']          = $this->model->use('AccountModel')->GetUserByRoles('Courier');
      $data['customers']         = $this->model->use('AccountModel')->GetUserByRoles('Customer');
      $data['service_modes']     = $this->model->use('ServiceModeModel')->GetList();
      $data['pay_modes']         = $this->model->use('PayModeModel')->GetList();
      if($id != null) {
        $queryAll                  = $this->model->use('TransactionsModel')->GetAllByTransactionsId(decode($id));
      } else {
        $queryAll                  = $this->model->use('TransactionsModel')->GetAll();
      }
      foreach($queryAll as $row) {
        $queryA                    = $this->model->use('AccountModel')->GetUserByid($row['accounts_id']);
        $queryB                    = $this->model->use('AccountModel')->GetUserByid($row['shipper_id']);
        $queryC                    = $this->model->use('LocationsModel')->GetAllProvincesById($row['origin_id']);
        $queryD                    = $this->model->use('LocationsModel')->GetAllProvincesById($row['destination_id']);
        $payModesId                = '';
        $payModesName              = '';
        $serviceModesId            = '';
        $serviceModesName          = '';
        if($id != null) {
          $payMode                 = $this->model->use('PayModeModel')->GetListById($row['pay_mode_id']);
          $serviceMode             = $this->model->use('ServiceModeModel')->GetListById($row['service_mode_id']);
          $payModesId              = $payMode[0]['pay_mode_id'];
          $payModesName            = $payMode[0]['pay_mode_name'];
          $serviceModesId          = $serviceMode[0]['service_mode_id'];
          $serviceModesName        = $serviceMode[0]['service_mode_name'];
        }
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
      $this->load->view('pages/admin/transactions/'.$page,$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }
    
    public function users($page,$id = null) {
      $data['token'] = $_SESSION['token'];
      $data['provinces'] = $this->model->use('LocationsModel')->GetAllProvinces();
      if($page == 'all') {
        $data['users'] = $this->model->use('AccountModel')->GetUserByRolesExceptAdmin('Admin');
      } elseif($page == 'view' && !empty($id)) {
        $accounts_id = decode($id);
        $data['getUsers'] = $this->model->use('AccountModel')->GetUserByid($accounts_id);
      }
      $this->load->view('layouts/header',$data);
      $this->load->view('layouts/top-navigation',$data);
      $this->load->view('layouts/side-navigation',$data);
      $this->load->view('pages/admin/users/'.$page,$data);
      $this->load->view('layouts/footer',$data);
      $this->load->view('layouts/scripts',$data);
    }

    public function reports() {
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/reports');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }

    public function settings() {
      $this->load->view('layouts/header');
      $this->load->view('layouts/top-navigation');
      $this->load->view('layouts/side-navigation');
      $this->load->view('pages/admin/settings');
      $this->load->view('layouts/footer');
      $this->load->view('layouts/scripts');
    }

    public function logout() {
      unset($_SESSION['accounts_id']);
      redirect('login','You are logged out.');
    }

}
